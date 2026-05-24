<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\Setting;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Xenon\LaravelBDSms\Provider\SMSNoc;
use Xenon\LaravelBDSms\Facades\SMS;

class UserTwoFactorAuthController extends Controller
{
    protected ?string $lastOtpError = null;

    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Show the OTP verification form.
     */
    public function showVerifyForm()
    {
        if (! session()->has('otp_user_id') || session('otp_guard') !== 'web') {
            return redirect()->route('login');
        }

        return view('admin.auth.two-steps', [ // can use same view or create a separate one later if needed
            'verifyRoute' => 'otp.verify.post',
            'resendRoute' => 'otp.resend',
            'length' => 6,
        ]);
    }

    /**
     * Handle OTP verification.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $userId = session('otp_user_id');
        $user = User::find($userId);

        if (! $user || session('otp_guard') !== 'web') {
            return redirect()->route('login');
        }

        $identifier = $user->phone ?? $user->email;

        if ($this->otpService->isLocked($identifier, 'web')) {
            $seconds = $this->otpService->remainingLockoutSeconds($identifier, 'web');

            return back()->withErrors([
                'otp' => 'Too many failed attempts. Please try again after '.max(1, ceil($seconds / 60)).' minute(s).',
            ]);
        }

        if ($this->otpService->verify($identifier, $request->otp, 'web')) {
            // Success, login the user
            Auth::guard('web')->login($user, session('otp_remember', false));
            $request->session()->regenerate();
            $request->session()->regenerateToken();

            // Mark otp as verified in DB
            $user->update(['otp_verified' => true]);

            // Clear session
            session()->forget(['otp_user_id', 'otp_remember', 'otp_identifier', 'otp_guard']);

            return redirect()->intended(route('admin.dashboard'));
        }

        $this->otpService->recordFailure($identifier, 'web');

        $remaining = $this->otpService->attemptsRemaining($identifier, 'web');
        if ($remaining <= 0) {
            $seconds = $this->otpService->remainingLockoutSeconds($identifier, 'web');

            return back()->withErrors([
                'otp' => 'Too many failed attempts. Please try again after '.max(1, ceil($seconds / 60)).' minute(s).',
            ]);
        }

        return back()->withErrors(['otp' => "The provided OTP is invalid or has expired. {$remaining} attempt(s) remaining."]);
    }

    /**
     * Resend the OTP.
     */
    public function resend()
    {
        $userId = session('otp_user_id');
        $user = User::find($userId);

        if (! $user || session('otp_guard') !== 'web') {
            return redirect()->route('login');
        }

        $identifier = $user->phone ?? $user->email;
        if ($this->otpService->isLocked($identifier, 'web')) {
            $seconds = $this->otpService->remainingLockoutSeconds($identifier, 'web');

            flash()->error('Please wait '.max(1, ceil($seconds / 60)).' minute(s) before requesting another code.');
            return back();
        }

        $result = $this->sendOtp($user);
        if (! ($result['ok'] ?? false)) {
            flash()->error($result['message'] ?? 'Unable to send OTP. Please contact support or try again later.');
            return back();
        }

        flash()->success('A new verification code has been sent.');

        return back();
    }

    /**
     * Internal method to send OTP.
     */
    public function sendOtp($user, string $scope = 'web'): array
    {
        $identifier = $user->phone ?? $user->email;
        $code = $this->otpService->generate($identifier, 6, 10, $scope);
        $sent = false;
        $channels = [];

        session(['otp_identifier' => $this->maskIdentifier($identifier)]);

        if (Setting::boolean('user_sms_otp_enabled', false) && ! empty($user->phone)) {
            if ($this->sendSmsOtp($user, $code, $scope)) {
                $sent = true;
                $channels[] = 'sms';
            }
        }

        if (Setting::boolean('user_email_otp_enabled', true) && ! empty($user->email)) {
            if ($this->sendEmailOtp($user, $code, $scope)) {
                $sent = true;
                $channels[] = 'email';
            }
        }

        if ($sent) {
            return ['ok' => true, 'channel' => implode('+', $channels)];
        }

        return ['ok' => false, 'message' => $this->lastOtpError ?? 'Unable to send OTP.'];
    }

    private function sendSmsOtp($user, string $code, string $scope = 'web'): bool
    {
        if (! Setting::boolean('user_sms_otp_enabled', false) || empty($user->phone)) {
            $this->lastOtpError = 'SMS OTP disabled for users or phone number is missing.';
            Log::warning('OTP SMS skipped: user_sms_otp_enabled off or phone missing', [
                'user_id' => $user->id ?? null,
            ]);

            return false;
        }

        $recipient = $this->normalizeBangladeshiPhoneNumber($user->phone);
        if (! $recipient) {
            $this->lastOtpError = 'Invalid phone format. Please update your profile phone number.';
            Log::warning('OTP SMS skipped: invalid phone format', [
                'user_id' => $user->id ?? null,
                'phone' => $user->phone,
            ]);

            return false;
        }

        try {
            SMS::via(SMSNoc::class)->shoot($recipient, "Your verification code is: $code");
            return true;
        } catch (\Throwable $e) {
            $this->lastOtpError = 'SMS send failed, trying email if enabled.';
            Log::error('OTP SMS failed via SMSNoc', [
                'user_id' => $user->id ?? null,
                'recipient' => $recipient,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    private function sendEmailOtp($user, string $code, string $scope = 'web'): bool
    {
        if (! Setting::boolean('user_email_otp_enabled', true) || empty($user->email)) {
            $this->lastOtpError = 'Email OTP is disabled or user email is missing.';
            return false;
        }

        try {
            Mail::to($user->email)->send(new SendOtpMail($code));
            $this->lastOtpError = null;

            return true;
        } catch (\Exception) {
            $this->lastOtpError = 'Email OTP failed. Please contact support.';
            return false;
        }
    }

    private function normalizeBangladeshiPhoneNumber(?string $phone): ?string
    {
        $phone = preg_replace('/\D/', '', (string) $phone);

        if ($phone === '') {
            return null;
        }

        if (str_starts_with($phone, '880') && strlen($phone) === 13) {
            return '0'.substr($phone, 3);
        }

        if (str_starts_with($phone, '0') && strlen($phone) === 11) {
            return $phone;
        }

        if (str_starts_with($phone, '1') && strlen($phone) === 10) {
            return '0'.$phone;
        }

        return null;
    }

    /**
     * Mask identifier for privacy
     */
    private function maskIdentifier($identifier)
    {
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $parts = explode('@', $identifier);

            return substr($parts[0], 0, 1).'***@'.$parts[1];
        }

        return '******'.substr($identifier, -4);
    }
}
