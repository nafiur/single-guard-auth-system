<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create groups
        $groups = [
            'Admin Management' => ['label' => 'Administrator Access', 'description' => 'Permissions related to admin accounts'],
            'Role Management' => ['label' => 'Access Control', 'description' => 'Permissions for roles and permissions'],
            'User Management' => ['label' => 'Public User Management', 'description' => 'Permissions for customers and vendors'],
            'System Logs' => ['label' => 'Audit Logs', 'description' => 'Permissions for system and activity logs'],
            'Settings' => ['label' => 'System Settings', 'description' => 'Permissions for general site settings'],
        ];

        foreach ($groups as $name => $details) {
            PermissionGroup::updateOrCreate(['name' => $name], $details);
        }

        $adminGroup = PermissionGroup::where('name', 'Admin Management')->first();
        $roleGroup = PermissionGroup::where('name', 'Role Management')->first();
        $userGroup = PermissionGroup::where('name', 'User Management')->first();
        $logGroup = PermissionGroup::where('name', 'System Logs')->first();
        $settingGroup = PermissionGroup::where('name', 'Settings')->first();

        // Create permissions
        $permissions = [
            // Admin management
            ['name' => 'view-administrators', 'label' => 'View Administrators', 'module' => 'Admins', 'group_id' => $adminGroup->id, 'guard_name' => 'web'],
            ['name' => 'create-administrators', 'label' => 'Create Administrators', 'module' => 'Admins', 'group_id' => $adminGroup->id, 'guard_name' => 'web'],
            ['name' => 'edit-administrators', 'label' => 'Edit Administrators', 'module' => 'Admins', 'group_id' => $adminGroup->id, 'guard_name' => 'web'],
            ['name' => 'delete-administrators', 'label' => 'Delete Administrators', 'module' => 'Admins', 'group_id' => $adminGroup->id, 'guard_name' => 'web'],

            // Role management
            ['name' => 'view-roles', 'label' => 'View Roles', 'module' => 'Roles', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'create-roles', 'label' => 'Create Roles', 'module' => 'Roles', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'edit-roles', 'label' => 'Edit Roles', 'module' => 'Roles', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'delete-roles', 'label' => 'Delete Roles', 'module' => 'Roles', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],

            ['name' => 'view-permissions', 'label' => 'View Permissions', 'module' => 'Permissions', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'create-permissions', 'label' => 'Create Permissions', 'module' => 'Permissions', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'edit-permissions', 'label' => 'Edit Permissions', 'module' => 'Permissions', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'delete-permissions', 'label' => 'Delete Permissions', 'module' => 'Permissions', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],

            ['name' => 'view-permission-groups', 'label' => 'View Permission Groups', 'module' => 'Groups', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'create-permission-groups', 'label' => 'Create Permission Groups', 'module' => 'Groups', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'edit-permission-groups', 'label' => 'Edit Permission Groups', 'module' => 'Groups', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],
            ['name' => 'delete-permission-groups', 'label' => 'Delete Permission Groups', 'module' => 'Groups', 'group_id' => $roleGroup->id, 'guard_name' => 'web'],

            // User management
            ['name' => 'view-users', 'label' => 'View Users', 'module' => 'Users', 'group_id' => $userGroup->id, 'guard_name' => 'web'],
            ['name' => 'create-users', 'label' => 'Create Users', 'module' => 'Users', 'group_id' => $userGroup->id, 'guard_name' => 'web'],
            ['name' => 'edit-users', 'label' => 'Edit Users', 'module' => 'Users', 'group_id' => $userGroup->id, 'guard_name' => 'web'],
            ['name' => 'delete-users', 'label' => 'Delete Users', 'module' => 'Users', 'group_id' => $userGroup->id, 'guard_name' => 'web'],

            // Log management
            ['name' => 'view-activity-logs', 'label' => 'View Activity Logs', 'module' => 'Logs', 'group_id' => $logGroup->id, 'guard_name' => 'web'],
            ['name' => 'delete-activity-logs', 'label' => 'Delete Activity Logs', 'module' => 'Logs', 'group_id' => $logGroup->id, 'guard_name' => 'web'],

            // Settings
            ['name' => 'view-settings', 'label' => 'View Settings', 'module' => 'Settings', 'group_id' => $settingGroup->id, 'guard_name' => 'web'],
            ['name' => 'update-settings', 'label' => 'Update Settings', 'module' => 'Settings', 'group_id' => $settingGroup->id, 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission['name'], 'guard_name' => $permission['guard_name']], $permission);
        }

        // Create Roles and assign permissions
        $superAdmin = Role::updateOrCreate(['name' => 'Super Admin', 'guard_name' => 'web'], ['label' => 'Super Administrator']);
        $superAdmin->syncPermissions(Permission::where('guard_name', 'web')->get());

        $admin = Role::updateOrCreate(['name' => 'Admin', 'guard_name' => 'web'], ['label' => 'Administrator']);
        $admin->syncPermissions([
            'view-administrators', 'create-administrators', 'edit-administrators',
            'view-roles', 'view-permissions', 'view-permission-groups',
            'view-users', 'create-users', 'edit-users',
            'view-activity-logs', 'view-settings',
        ]);

        $manager = Role::updateOrCreate(['name' => 'Manager', 'guard_name' => 'web'], ['label' => 'Manager']);
        $manager->syncPermissions(['view-administrators', 'view-roles', 'view-users', 'edit-users']);
    }
}

