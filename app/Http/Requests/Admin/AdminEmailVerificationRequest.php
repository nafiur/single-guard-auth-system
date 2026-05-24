<?php

namespace App\Http\Requests\Admin;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class AdminEmailVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Uses the 'admin' guard explicitly instead of the default guard.
     */
    public function authorize(): bool
    {
        $admin = $this->user();

        if (! $admin) {
            return false;
        }

        if (! hash_equals((string) $admin->getKey(), (string) $this->route('id'))) {
            return false;
        }

        if (! hash_equals(sha1($admin->getEmailForVerification()), (string) $this->route('hash'))) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Fulfill the email verification request for the admin guard.
     */
    public function fulfill(): void
    {
        $admin = $this->user();

        if (! $admin->hasVerifiedEmail()) {
            $admin->markEmailAsVerified();

            event(new Verified($admin));
        }
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): Validator
    {
        return $validator;
    }
}

