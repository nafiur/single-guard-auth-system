<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminConfirmablePasswordController;
use App\Http\Controllers\Admin\AdminEmailVerificationNotificationController;
use App\Http\Controllers\Admin\AdminEmailVerificationPromptController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\AdminNewPasswordController;
use App\Http\Controllers\Admin\AdminPasswordController;
use App\Http\Controllers\Admin\AdminPasswordResetLinkController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminTwoFactorAuthController;
use App\Http\Controllers\Admin\AdminVerifyEmailController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:web')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('login', [AdminAuthController::class, 'login']);

    Route::get('forgot-password', [AdminPasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [AdminPasswordResetLinkController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('password.email');

    Route::get('forgot-password/verify', [AdminPasswordResetLinkController::class, 'showVerifyForm'])
        ->name('password.otp.verify');

    Route::post('forgot-password/verify', [AdminPasswordResetLinkController::class, 'verify'])
        ->middleware('throttle:5,1')
        ->name('password.otp.verify.post');

    Route::post('forgot-password/resend-otp', [AdminPasswordResetLinkController::class, 'resend'])
        ->middleware('throttle:3,1')
        ->name('password.otp.resend');

    Route::get('reset-password/{token}', [AdminNewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [AdminNewPasswordController::class, 'store'])
        ->name('password.store');

    // OTP Verification
    Route::get('verify-otp', [AdminTwoFactorAuthController::class, 'showVerifyForm'])
        ->name('otp.verify')
        ->middleware('throttle:10,1');
    Route::post('verify-otp', [AdminTwoFactorAuthController::class, 'verify'])
        ->name('otp.verify.post')
        ->middleware('throttle:5,1');
    Route::post('resend-otp', [AdminTwoFactorAuthController::class, 'resend'])
        ->name('otp.resend')
        ->middleware('throttle:3,1');
});

Route::middleware('auth:web')->group(function () {
    Route::middleware('verified.admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Roles Management
        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('permission:view-roles,web');
            Route::get('/create', [RoleController::class, 'create'])->name('create')->middleware('permission:create-roles,web');
            Route::post('/', [RoleController::class, 'store'])->name('store')->middleware('permission:create-roles,web');
            Route::get('/{role}', [RoleController::class, 'show'])->name('show')->middleware('permission:view-roles,web');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit')->middleware('permission:edit-roles,web');
            Route::put('/{role}', [RoleController::class, 'update'])->name('update')->middleware('permission:edit-roles,web');
            Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy')->middleware('permission:delete-roles,web');
        });

        // Permissions Management
        Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index')->middleware('permission:view-permissions,web');
            Route::get('/create', [PermissionController::class, 'create'])->name('create')->middleware('permission:create-permissions,web');
            Route::post('/', [PermissionController::class, 'store'])->name('store')->middleware('permission:create-permissions,web');
            Route::get('/{permission}', [PermissionController::class, 'show'])->name('show')->middleware('permission:view-permissions,web');
            Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('edit')->middleware('permission:edit-permissions,web');
            Route::put('/{permission}', [PermissionController::class, 'update'])->name('update')->middleware('permission:edit-permissions,web');
            Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('destroy')->middleware('permission:delete-permissions,web');
        });

        // Permission Groups Management
        Route::group(['prefix' => 'permission-groups', 'as' => 'permission-groups.'], function () {
            Route::get('/', [PermissionGroupController::class, 'index'])->name('index')->middleware('permission:view-permission-groups,web');
            Route::get('/create', [PermissionGroupController::class, 'create'])->name('create')->middleware('permission:create-permission-groups,web');
            Route::post('/', [PermissionGroupController::class, 'store'])->name('store')->middleware('permission:create-permission-groups,web');
            Route::get('/{permission_group}', [PermissionGroupController::class, 'show'])->name('show')->middleware('permission:view-permission-groups,web');
            Route::get('/{permission_group}/edit', [PermissionGroupController::class, 'edit'])->name('edit')->middleware('permission:edit-permission-groups,web');
            Route::put('/{permission_group}', [PermissionGroupController::class, 'update'])->name('update')->middleware('permission:edit-permission-groups,web');
            Route::delete('/{permission_group}', [PermissionGroupController::class, 'destroy'])->name('destroy')->middleware('permission:delete-permission-groups,web');
        });

        // Administrators Management
        Route::group(['prefix' => 'administrators', 'as' => 'administrators.'], function () {
            Route::get('/', [AdministratorController::class, 'index'])->name('index')->middleware('permission:view-administrators,web');
            Route::get('/create', [AdministratorController::class, 'create'])->name('create')->middleware('permission:create-administrators,web');
            Route::post('/', [AdministratorController::class, 'store'])->name('store')->middleware('permission:create-administrators,web');
            Route::get('/{administrator}', [AdministratorController::class, 'show'])->name('show')->middleware('permission:view-administrators,web');
            Route::get('/{administrator}/edit', [AdministratorController::class, 'edit'])->name('edit')->middleware('permission:edit-administrators,web');
            Route::put('/{administrator}', [AdministratorController::class, 'update'])->name('update')->middleware('permission:edit-administrators,web');
            Route::delete('/{administrator}', [AdministratorController::class, 'destroy'])->name('destroy')->middleware('permission:delete-administrators,web');
        });

        // Users Management
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:view-users,web');
            Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('permission:create-users,web');
            Route::post('/', [UserController::class, 'store'])->name('store')->middleware('permission:create-users,web');
            Route::get('/{user}', [UserController::class, 'show'])->name('show')->middleware('permission:view-users,web');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('permission:edit-users,web');
            Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('permission:edit-users,web');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:delete-users,web');
        });

        // Activity Logs
        Route::group(['prefix' => 'activity-logs', 'as' => 'activity-logs.'], function () {
            Route::get('/', [ActivityLogController::class, 'index'])->name('index')->middleware('permission:view-activity-logs,web');
            Route::get('/{activity_log}', [ActivityLogController::class, 'show'])->name('show')->middleware('permission:view-activity-logs,web');
            Route::delete('/{activity_log}', [ActivityLogController::class, 'destroy'])->name('destroy')->middleware('permission:delete-activity-logs,web');
        });

        // Settings
        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::get('/', [SettingController::class, 'index'])->name('index')->middleware('permission:view-settings,web');
            Route::put('/', [SettingController::class, 'update'])->name('update')->middleware('permission:update-settings,web');
        });

        Route::get('confirm-password', [AdminConfirmablePasswordController::class, 'show'])
            ->name('password.confirm');

        Route::post('confirm-password', [AdminConfirmablePasswordController::class, 'store'])
            ->name('password.confirm.post');

        Route::put('password', [AdminPasswordController::class, 'update'])->name('password.update')->middleware('password.confirm.admin');

        Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [AdminProfileController::class, 'update'])->name('profile.update');

        // Notifications
        Route::get('notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('markAsRead');
        Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    });

    Route::get('verify-email', AdminEmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', AdminVerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [AdminEmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::post('logout', [AdminAuthController::class, 'logout'])
        ->name('logout');
});



