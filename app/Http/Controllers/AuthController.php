<?php
namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $loginEnabled = Setting::boolean('user_login_enabled', true);

        return view('auth.login', compact('loginEnabled'));
    }

    public function login(LoginRequest $request)
    {
        if (! Setting::boolean('user_login_enabled', true)) {
            return redirect()->route('login')->withErrors([
                'email' => 'User login is currently disabled. Please contact support.',
            ])->withInput();
        }

        $user = $request->authenticate('web');
        if (! $user) {
            return redirect()->route('login')->withErrors([
                'email' => 'Unable to authenticate user.',
            ])->withInput();
        }

        if (! Setting::boolean('otp_enabled', true)) {
            Auth::guard('web')->login($user, $request->boolean('remember'));
            $request->session()->regenerate();
            $request->session()->regenerateToken();

            return redirect()->intended(route('admin.dashboard'));
        }

        // Start OTP flow
        session([
            'otp_user_id'  => $user->id,
            'otp_guard'    => 'web',
            'otp_remember' => $request->boolean('remember'),
        ]);

        $twoFactor = app(\App\Http\Controllers\Auth\UserTwoFactorAuthController::class);
        $otpResult = $twoFactor->sendOtp($user);
        if (! ($otpResult['ok'] ?? false)) {
            return redirect()->back()->withErrors([
                'email' => $otpResult['message'] ?? 'Unable to send OTP right now. Please contact support.',
            ])->withInput();
        }

        return redirect()->route('otp.verify');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
