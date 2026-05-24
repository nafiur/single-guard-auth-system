<?php

namespace App\Enums;

enum AccountStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case BANNED = 'banned';

    /**
     * Get a human-readable label for the status.
     */
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::BANNED => 'Banned',
        };
    }

    /**
     * Get the CSS color class or hex code for the status badge.
     */
    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => '#d1fae5', // Light green
            self::INACTIVE => '#f3f4f6', // Gray
            self::BANNED => '#fee2e2', // Light red
        };
    }
}
