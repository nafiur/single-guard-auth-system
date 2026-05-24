<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Enums\AccountStatus;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\OtpService;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    public function __construct(protected OtpService $otpService)
    {
    }

    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::query()->where('email', $request->string('email'))->first();

        if (! $user) {
            return back()->with('status', 'If an account exists for that email, an OTP has been sent.');
        }

        if ($user->status !== AccountStatus::ACTIVE) {
            return back()->withErrors([
                'email' => 'This account is inactive or banned.',
            ])->withInput();
        }

        $token = Password::createToken($user);

        $twoFactor = app(\App\Http\Controllers\Auth\UserTwoFactorAuthController::class);
        $otpResult = $twoFactor->sendOtp($user, 'password_reset_user');

        if (! ($otpResult['ok'] ?? false)) {
            return back()->withErrors([
                'email' => $otpResult['message'] ?? 'Unable to send OTP. Please try again.',
            ])->withInput();
        }

        session()->put('password_reset_context', [
            'guard' => 'web',
            'email' => $user->email,
            'token' => $token,
            'scope' => 'password_reset_user',
        ]);

        return redirect()->route('password.otp.verify');
    }

    public function showVerifyForm()
    {
        if (! session()->has('password_reset_context')) {
            return redirect()->route('password.request');
        }

        return view('admin.auth.two-steps', [
            'verifyRoute' => 'password.otp.verify.post',
            'resendRoute' => 'password.otp.resend',
            'length' => 6,
        ]);
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $context = session('password_reset_context');

        if (! is_array($context) || ($context['guard'] ?? null) !== 'web' || ! isset($context['email'], $context['token'], $context['scope'])) {
            return redirect()->route('password.request');
        }

        $user = User::query()->where('email', $context['email'])->first();
        if (! $user) {
            session()->forget('password_reset_context');

            return redirect()->route('password.request')->withErrors([
                'email' => 'Invalid reset request.',
            ]);
        }

        if ($user->status !== AccountStatus::ACTIVE) {
            session()->forget('password_reset_context');

            return redirect()->route('password.request')->withErrors([
                'email' => 'This account is inactive or banned.',
            ]);
        }

        $identifier = $user->phone ?? $user->email;
        $scope = $context['scope'];

        if ($this->otpService->isLocked($identifier, $scope)) {
            $seconds = $this->otpService->remainingLockoutSeconds($identifier, $scope);

            return back()->withErrors([
                'otp' => 'Too many failed attempts. Please try again after '.max(1, ceil($seconds / 60)).' minute(s).',
            ]);
        }

        if (! $this->otpService->verify($identifier, $request->otp, $scope)) {
            $this->otpService->recordFailure($identifier, $scope);

            $remaining = $this->otpService->attemptsRemaining($identifier, $scope);
            if ($remaining <= 0) {
                $seconds = $this->otpService->remainingLockoutSeconds($identifier, $scope);

                return back()->withErrors([
                    'otp' => 'Too many failed attempts. Please try again after '.max(1, ceil($seconds / 60)).' minute(s).',
                ]);
            }

            return back()->withErrors([
                'otp' => "The provided OTP is invalid or has expired. {$remaining} attempt(s) remaining.",
            ]);
        }

        session()->put('password_reset_context', array_merge($context, [
            'otp_verified_at' => now()->toDateTimeString(),
        ]));

        return redirect()->route('password.reset', [
            'token' => $context['token'],
            'email' => $context['email'],
        ]);
    }

    public function resend(): RedirectResponse
    {
        $context = session('password_reset_context');

        if (! is_array($context) || ($context['guard'] ?? null) !== 'web' || ! isset($context['email'], $context['scope'])) {
            return redirect()->route('password.request');
        }

        $user = User::query()->where('email', $context['email'])->first();
        if (! $user) {
            session()->forget('password_reset_context');

            return redirect()->route('password.request')->withErrors([
                'email' => 'Invalid reset request.',
            ]);
        }

        $identifier = $user->phone ?? $user->email;
        if ($this->otpService->isLocked($identifier, $context['scope'])) {
            $seconds = $this->otpService->remainingLockoutSeconds($identifier, $context['scope']);

            return back()->withErrors([
                'otp' => 'Please wait '.max(1, ceil($seconds / 60)).' minute(s) before requesting another code.',
            ]);
        }

        $twoFactor = app(\App\Http\Controllers\Auth\UserTwoFactorAuthController::class);
        $otpResult = $twoFactor->sendOtp($user, $context['scope']);
        if (! ($otpResult['ok'] ?? false)) {
            return back()->withErrors([
                'otp' => $otpResult['message'] ?? 'Unable to send OTP. Please try again later.',
            ]);
        }

        return back()->with('status', 'A new verification code has been sent.');
    }
}
