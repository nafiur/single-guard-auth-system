<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('otp:prune-expired', function () {
    $count = app(\App\Services\OtpService::class)->cleanupExpired();
    $this->info("Removed {$count} expired OTP record(s).");
})->purpose('Prune expired OTP records');

Schedule::command('otp:prune-expired')->everyFiveMinutes();
