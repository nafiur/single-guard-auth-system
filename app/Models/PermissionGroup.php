<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $fillable = [
        'name',
        'label',
        'description',
        'is_active',
        'created_by',
        'updated_by',
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'group_id');
    }
}
