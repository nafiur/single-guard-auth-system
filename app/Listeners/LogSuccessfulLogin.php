<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        // Ensure the model actually uses the features
        if (method_exists($user, 'loginHistories')) {
            // Record login history
            $user->loginHistories()->create([
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'login_at' => now(),
            ]);

            // Update last login timestamp
            $user->last_login_at = now();
            // Temporarily disable timestamp updates so we don't mess up updated_at ? maybe yes maybe no. let's just save.
            $user->save();
        }
    }
}
