<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\AccountStatus;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check for 'admin' guard first
        if (Auth::guard('web')->check()) {
            $admin = Auth::guard('web')->user();
            if ($admin->status !== AccountStatus::ACTIVE) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('admin.login')->withErrors([
                    'login' => __('Your account has been deactivated. Please contact support.'),
                ]);
            }
        }

        // Check for 'web' guard
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            if ($user->status !== AccountStatus::ACTIVE) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->withErrors([
                    'email' => __('Your account has been deactivated. Please contact support.'),
                ]);
            }
        }

        return $next($request);
    }
}

