<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\AccountStatus;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AdminPasswordResetLinkController extends Controller
{
    public function __construct(protected OtpService $otpService)
    {
    }

    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $admin = User::query()
            ->where('user_type', 'admin')
            ->where('email', $request->string('email'))
            ->first();

        if (! $admin) {
            return back()->with('status', 'If an account exists for that email, an OTP has been sent.');
        }

        if ($admin->status !== AccountStatus::ACTIVE) {
            return back()->withErrors([
                'email' => 'This account is inactive or banned.',
            ])->withInput();
        }

        $token = Password::broker('users')->createToken($admin);

        $twoFactor = app(\App\Http\Controllers\Admin\AdminTwoFactorAuthController::class);
        $otpResult = $twoFactor->sendOtp($admin, 'password_reset_admin');
        if (! ($otpResult['ok'] ?? false)) {
            return back()->withErrors([
                'email' => $otpResult['message'] ?? 'Unable to send OTP. Please try again.',
            ])->withInput();
        }

        session()->put('admin_password_reset_context', [
            'guard' => 'web',
            'email' => $admin->email,
            'token' => $token,
            'scope' => 'password_reset_admin',
        ]);

        return redirect()->route('admin.password.otp.verify');
    }

    public function showVerifyForm()
    {
        if (! session()->has('admin_password_reset_context')) {
            return redirect()->route('admin.password.request');
        }

        return view('admin.auth.two-steps', [
            'verifyRoute' => 'admin.password.otp.verify.post',
            'resendRoute' => 'admin.password.otp.resend',
            'length' => 6,
        ]);
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $context = session('admin_password_reset_context');

        if (! is_array($context) || ($context['guard'] ?? null) !== 'web' || ! isset($context['email'], $context['token'], $context['scope'])) {
            return redirect()->route('admin.password.request');
        }

        $admin = User::query()->where('user_type', 'admin')->where('email', $context['email'])->first();
        if (! $admin) {
            session()->forget('admin_password_reset_context');

            return redirect()->route('admin.password.request')->withErrors([
                'email' => 'Invalid reset request.',
            ]);
        }

        if ($admin->status !== AccountStatus::ACTIVE) {
            session()->forget('admin_password_reset_context');

            return redirect()->route('admin.password.request')->withErrors([
                'email' => 'This account is inactive or banned.',
            ]);
        }

        $identifier = $admin->phone ?? $admin->email;
        if ($this->otpService->isLocked($identifier, $context['scope'])) {
            $seconds = $this->otpService->remainingLockoutSeconds($identifier, $context['scope']);

            return back()->withErrors([
                'otp' => 'Too many failed attempts. Please try again after '.max(1, ceil($seconds / 60)).' minute(s).',
            ]);
        }

        if (! $this->otpService->verify($identifier, $request->otp, $context['scope'])) {
            $this->otpService->recordFailure($identifier, $context['scope']);

            $remaining = $this->otpService->attemptsRemaining($identifier, $context['scope']);
            if ($remaining <= 0) {
                $seconds = $this->otpService->remainingLockoutSeconds($identifier, $context['scope']);

                return back()->withErrors([
                    'otp' => 'Too many failed attempts. Please try again after '.max(1, ceil($seconds / 60)).' minute(s).',
                ]);
            }

            return back()->withErrors([
                'otp' => "The provided OTP is invalid or has expired. {$remaining} attempt(s) remaining.",
            ]);
        }

        session()->put('admin_password_reset_context', array_merge($context, [
            'otp_verified_at' => now()->toDateTimeString(),
        ]));

        return redirect()->route('admin.password.reset', [
            'token' => $context['token'],
            'email' => $context['email'],
        ]);
    }

    public function resend(): RedirectResponse
    {
        $context = session('admin_password_reset_context');

        if (! is_array($context) || ($context['guard'] ?? null) !== 'web' || ! isset($context['email'], $context['scope'])) {
            return redirect()->route('admin.password.request');
        }

        $admin = User::query()->where('user_type', 'admin')->where('email', $context['email'])->first();
        if (! $admin) {
            session()->forget('admin_password_reset_context');

            return redirect()->route('admin.password.request')->withErrors([
                'email' => 'Invalid reset request.',
            ]);
        }

        if ($admin->status !== AccountStatus::ACTIVE) {
            session()->forget('admin_password_reset_context');

            return redirect()->route('admin.password.request')->withErrors([
                'email' => 'This account is inactive or banned.',
            ]);
        }

        $identifier = $admin->phone ?? $admin->email;
        if ($this->otpService->isLocked($identifier, $context['scope'])) {
            $seconds = $this->otpService->remainingLockoutSeconds($identifier, $context['scope']);

            return back()->withErrors([
                'otp' => 'Please wait '.max(1, ceil($seconds / 60)).' minute(s) before requesting another code.',
            ]);
        }

        $twoFactor = app(\App\Http\Controllers\Admin\AdminTwoFactorAuthController::class);
        $otpResult = $twoFactor->sendOtp($admin, $context['scope']);
        if (! ($otpResult['ok'] ?? false)) {
            return back()->withErrors([
                'otp' => $otpResult['message'] ?? 'Unable to send OTP. Please try again later.',
            ]);
        }

        return back()->with('status', 'A new verification code has been sent.');
    }
}
