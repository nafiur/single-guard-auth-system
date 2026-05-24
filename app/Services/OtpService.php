<?php

namespace App\Services;

use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;

class OtpService
{
    private const OTP_LENGTH = 6;
    private const MAX_VERIFY_ATTEMPTS = 5;
    private const VERIFY_LOCKOUT_SECONDS = 300;

    /**
     * Generate and save a new OTP.
     */
    public function generate(string $identifier, int $length = 6, int $expiryMinutes = 10, string $scope = 'default'): string
    {
        $scopedIdentifier = $this->scopeIdentifier($identifier, $scope);
        $this->clearAttempts($scopedIdentifier);

        // Delete any existing OTP for this scoped identifier
        Otp::where('identifier', $scopedIdentifier)->delete();

        $code = $this->generateNumericCode($length);

        Otp::create([
            'identifier' => $scopedIdentifier,
            'code' => $this->hashCode($code),
            'expires_at' => Carbon::now()->addMinutes($expiryMinutes),
        ]);

        return $code;
    }

    /**
     * Verify the provided OTP.
     */
    public function verify(string $identifier, string $code, string $scope = 'default'): bool
    {
        $scopedIdentifier = $this->scopeIdentifier($identifier, $scope);

        $otp = Otp::where('identifier', $scopedIdentifier)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if ($otp && hash_equals((string) $otp->code, $this->hashCode($code))) {
            $otp->delete();
            $this->clearAttempts($scopedIdentifier);
            return true;
        }

        return false;
    }

    public function verifyAny(string $identifier, string $code, array $scopes = ['default']): bool
    {
        foreach ($scopes as $scope) {
            if ($this->verify($identifier, $code, (string) $scope)) {
                return true;
            }
        }

        return false;
    }

    public function clearFailures(string $identifier, string $scope = 'default'): void
    {
        $scopedIdentifier = $this->scopeIdentifier($identifier, $scope);
        $this->clearAttempts($scopedIdentifier);
    }

    public function isLocked(string $identifier, string $scope = 'default'): bool
    {
        return RateLimiter::tooManyAttempts($this->throttleKey($identifier, $scope), self::MAX_VERIFY_ATTEMPTS);
    }

    public function recordFailure(string $identifier, string $scope = 'default'): void
    {
        RateLimiter::hit($this->throttleKey($identifier, $scope), self::VERIFY_LOCKOUT_SECONDS);
    }

    public function remainingLockoutSeconds(string $identifier, string $scope = 'default'): int
    {
        return RateLimiter::availableIn($this->throttleKey($identifier, $scope));
    }

    public function attemptsRemaining(string $identifier, string $scope = 'default'): int
    {
        $attempts = RateLimiter::attempts($this->throttleKey($identifier, $scope));

        return max(0, self::MAX_VERIFY_ATTEMPTS - $attempts);
    }

    public function cleanupExpired(): int
    {
        return Otp::where('expires_at', '<', Carbon::now())->delete();
    }

    private function clearAttempts(string $scopedIdentifier): void
    {
        $parts = explode('::', $scopedIdentifier, 2);
        if (count($parts) === 2) {
            RateLimiter::clear($this->throttleKey($parts[1], $parts[0]));
        }
    }

    private function hashCode(string $code): string
    {
        return hash_hmac('sha256', $code, (string) Config::get('app.key'));
    }

    private function scopeIdentifier(string $identifier, string $scope): string
    {
        return $scope.'::'.$identifier;
    }

    private function throttleKey(string $identifier, string $scope = 'default'): string
    {
        return $scope.'::'.strtolower($identifier);
    }

    private function generateNumericCode(int $length = self::OTP_LENGTH): string
    {
        $max = (int) (pow(10, $length) - 1);
        $number = random_int(0, $max);

        return str_pad((string) $number, $length, '0', STR_PAD_LEFT);
    }
}
