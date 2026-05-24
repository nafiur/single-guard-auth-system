<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\UserTwoFactorAuthController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CaseController;
use App\Http\Controllers\Frontend\CatalogueController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('frontend.about.index');
Route::get('/products', [ProductController::class, 'index'])->name('frontend.products.index');
Route::get('/product-details/{id}', [ProductController::class, 'show'])->name('frontend.products.show');
Route::get('/catalogue-download', [CatalogueController::class, 'index'])->name('frontend.catalogue-download.index');
Route::get('/catalogue-download/details/{id}', [CatalogueController::class, 'show'])->name('frontend.catalogue-download.show');
Route::get('/catalogue-download/download/{id}', [CatalogueController::class, 'download'])->name('frontend.catalogue-download.download');
Route::get('/news', [NewsController::class, 'index'])->name('frontend.news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('frontend.news.show');
Route::get('/cases', [CaseController::class, 'index'])->name('frontend.cases.index');
Route::get('/case-details/{id}', [CaseController::class, 'show'])->name('frontend.cases.show');
Route::get('/contact', [ContactController::class, 'contact'])->name('frontend.contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('frontend.contact.submit');

Route::middleware('guest:web')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('password.email');

    Route::get('forgot-password/verify', [PasswordResetLinkController::class, 'showVerifyForm'])
        ->name('password.otp.verify');

    Route::post('forgot-password/verify', [PasswordResetLinkController::class, 'verify'])
        ->middleware('throttle:5,1')
        ->name('password.otp.verify.post');

    Route::post('forgot-password/resend-otp', [PasswordResetLinkController::class, 'resend'])
        ->middleware('throttle:3,1')
        ->name('password.otp.resend');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

    // OTP Verification
    Route::get('verify-otp', [UserTwoFactorAuthController::class, 'showVerifyForm'])
        ->name('otp.verify')
        ->middleware('throttle:10,1');
    Route::post('verify-otp', [UserTwoFactorAuthController::class, 'verify'])
        ->name('otp.verify.post')
        ->middleware('throttle:5,1');
    Route::post('resend-otp', [UserTwoFactorAuthController::class, 'resend'])
        ->name('otp.resend')
        ->middleware('throttle:3,1');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Notifications
    Route::get('notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('user.markAsRead');
    Route::get('notifications', [NotificationController::class, 'index'])->name('user.notifications.index');
});

