<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(AdminLoginRequest $request)
    {
        $admin = $request->authenticate();
        if (! $admin) {
            return redirect()->route('admin.login')->withErrors([
                'login' => 'Unable to authenticate admin user.',
            ])->withInput();
        }

        if (! Setting::boolean('otp_enabled_admin', true)) {
            Auth::guard('web')->login($admin, $request->boolean('remember'));
            $request->session()->regenerate();
            $request->session()->regenerateToken();

            return redirect()->intended(route('admin.dashboard'));
        }

        // Start OTP flow
        session([
            'otp_user_id' => $admin->id,
            'otp_guard' => 'web',
            'otp_remember' => $request->boolean('remember'),
        ]);

        $twoFactor = app(AdminTwoFactorAuthController::class);
        $otpResult = $twoFactor->sendOtp($admin);
        if (! ($otpResult['ok'] ?? false)) {
            return redirect()->back()->withErrors([
                'email' => $otpResult['message'] ?? 'Unable to send OTP right now. Please contact support.',
            ])->withInput();
        }

        return redirect()->route('admin.otp.verify');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}

