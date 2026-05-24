<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role, ?string $guard = null): Response
    {
        $user = $request->user($guard);

        if (! $user || $user->user_type !== $role) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
