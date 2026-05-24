<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminEmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class AdminVerifyEmailController extends Controller
{
    /**
     * Mark the authenticated admin's email address as verified.
     * Uses AdminEmailVerificationRequest which checks the 'admin' guard.
     */
    public function __invoke(AdminEmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->intended(route('admin.dashboard').'?verified=1');
    }
}
