<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'label' => 'Site Name', 'value' => 'Site Name', 'group' => 'general'],
            ['key' => 'site_logo', 'label' => 'Site Logo', 'value' => '', 'group' => 'general'],
            ['key' => 'sidebar_logo', 'label' => 'Sidebar Logo', 'value' => '', 'group' => 'general'],
            ['key' => 'admin_sidebar_logo', 'label' => 'Admin Sidebar Logo', 'value' => '', 'group' => 'general'],
            ['key' => 'admin_sidebar_title', 'label' => 'Admin Sidebar Title', 'value' => 'Site Name', 'group' => 'general'],
            ['key' => 'contact_email', 'label' => 'Contact Email', 'value' => 'info@nafiur.com', 'group' => 'general'],
            ['key' => 'contact_phone', 'label' => 'Contact Phone', 'value' => '+880123456789', 'group' => 'general'],
            ['key' => 'user_login_enabled', 'label' => 'Allow User Login', 'value' => '1', 'group' => 'security'],
            ['key' => 'user_registration_enabled', 'label' => 'Allow User Registration', 'value' => '0', 'group' => 'security'],
            ['key' => 'otp_enabled', 'label' => 'Require OTP for User Login', 'value' => '0', 'group' => 'security'],
            ['key' => 'user_email_otp_enabled', 'label' => 'Enable Email OTP for User Login', 'value' => '0', 'group' => 'security'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
