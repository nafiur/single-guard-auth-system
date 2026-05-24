<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->useLogName('system');
    }

    protected $fillable = [
        'module',
        'name',
        'guard_name',
        'group_id',
        'label',
        'description',
        'is_active',
        'created_by',
        'updated_by',
    ];

    public function group()
    {
        return $this->belongsTo(PermissionGroup::class, 'group_id');
    }
}
