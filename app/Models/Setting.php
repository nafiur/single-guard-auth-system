<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'label',
        'group',
        'created_by',
        'updated_by',

    ];

    public static function value(string $key, mixed $default = null): mixed
    {
        return static::query()
            ->where('key', $key)
            ->value('value') ?? $default;
    }

    public static function boolean(string $key, bool $default = false): bool
    {
        $value = static::value($key, $default ? '1' : '0');

        if (is_bool($value)) {
            return $value;
        }

        $normalized = strtolower(trim((string) $value));

        return in_array($normalized, ['1', 'true', 'on', 'yes', 'y'], true);
    }

    public static function otpChannel(string $key, string $default = 'email'): string
    {
        $channel = strtolower(trim((string) static::value($key, $default)));

        return in_array($channel, ['email', 'sms'], true) ? $channel : $default;
    }
}
