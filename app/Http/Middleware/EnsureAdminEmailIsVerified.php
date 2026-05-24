<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * Checks the 'admin' guard specifically instead of the default guard,
     * preventing cross-guard verification bypass.
     */
    public function handle(Request $request, Closure $next, ?string $redirectToRoute = null): Response
    {
        $admin = $request->user();

        if (! $admin ||
            ($admin instanceof MustVerifyEmail && ! $admin->hasVerifiedEmail())) {
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'admin.verification.notice'));
        }

        return $next($request);
    }
}

