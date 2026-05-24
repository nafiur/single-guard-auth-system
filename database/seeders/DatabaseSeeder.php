<?php
namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! app()->environment(['local', 'testing'])) {
            return;
        }

        // User::factory(10)->create();
        $password = env('LOCAL_USER_SEED_PASSWORD', 'password');

        if ($this->command) {
            $this->command->line("nafiur@outlook.com (Super Admin) password: {$password}");
            $this->command->line("admin@nafiur.com (Admin) password: {$password}");
            $this->command->line("user@nafiur.com password: {$password}");
        }

        $this->call([
            SettingSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        $admin = User::updateOrCreate(
            ['email' => 'nafiur@outlook.com'],
            [
                'name'              => 'Super Admin',
                'username'          => 'superadmin',
                'user_type'         => 'admin',
                'otp_verified'      => true,
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make($password),
            ]
        );

        $admin->assignRole('Super Admin');

        $adminTwo = User::updateOrCreate(
            ['email' => 'admin@nafiur.com'],
            [
                'name'              => 'Admin User',
                'username'          => 'adminuser',
                'user_type'         => 'admin',
                'otp_verified'      => true,
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make($password),
            ]
        );

        $adminTwo->syncRoles(['Admin']);

    }
}
