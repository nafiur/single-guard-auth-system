<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class LoginHistory extends Model
{
    use HasFactory;

    /**
     * Disable updated_at column since we only care when it was created.
     */
    const UPDATED_AT = null;

    protected $fillable = [
        'authenticatable_type',
        'authenticatable_id',
        'ip_address',
        'user_agent',
        'login_at',
    ];

    protected $casts = [
        'login_at' => 'datetime',
    ];

    /**
     * Get the authenticatable entity that logged in.
     */
    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }
}
