<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\CheckAccountStatus::class,
        ]);

        // Logged-in users trying to access guest routes (like login screen) will be checked by their active guard
        $middleware->redirectUsersTo(function (Request $request) {
            if (Auth::guard('web')->check()) {
                return route('admin.dashboard');
            }

            return route('login');
        });

        $middleware->alias([
            'role' => \App\Http\Middleware\Role::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'password.confirm.admin' => \App\Http\Middleware\AdminRequirePassword::class,
            'verified.admin' => \App\Http\Middleware\EnsureAdminEmailIsVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Guests trying to access secure routes will be redirected based on the missing guard
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }

            $guards = $e->guards();

            if (in_array('admin', $guards)) {
                return redirect()->guest(route('admin.login'));
            }

            return redirect()->guest(route('login'));
        });
    })->create();
