<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $existing = Setting::all()->keyBy('key');
        $defaults = collect($this->settingDefaults())
            ->map(function (array $meta, string $key) use ($existing) {
                if ($existing->has($key)) {
                    return $existing->get($key);
                }

                return new Setting([
                    'key' => $key,
                    'label' => $meta['label'],
                    'value' => $meta['value'],
                    'group' => $meta['group'],
                ]);
            });

        $settings = $defaults
            ->merge($existing->except(array_keys($this->settingDefaults())))
            ->values()
            ->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:2048'],
            'sidebar_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:2048'],
            'admin_sidebar_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:2048'],
        ]);

        $allowedKeys = array_keys($this->settingMeta());
        $data = $request->except('_token', '_method', 'site_logo', 'sidebar_logo', 'admin_sidebar_logo');
        $data = array_intersect_key($data, array_flip($allowedKeys));

        $logoKeys = ['site_logo', 'sidebar_logo', 'admin_sidebar_logo'];

        foreach ($logoKeys as $logoKey) {
            if (! $request->hasFile($logoKey)) {
                continue;
            }

            $oldLogo = Setting::where('key', $logoKey)->value('value');
            $this->deleteOldLogoFile($oldLogo);

            $uploadDir = public_path('upload/admin-settings');
            if (! File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0775, true);
            }

            $extension = $request->file($logoKey)->getClientOriginalExtension();
            $fileName = $logoKey . '-' . now()->format('YmdHis') . '-' . Str::random(8) . '.' . $extension;
            $request->file($logoKey)->move($uploadDir, $fileName);

            $data[$logoKey] = '/upload/admin-settings/' . $fileName;
        }

        $settingMeta = $this->settingMeta();

        foreach ($data as $key => $value) {
            $meta = $settingMeta[$key] ?? ['label' => Str::headline(str_replace('_', ' ', $key)), 'group' => 'general'];

            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                [
                    'label' => $meta['label'],
                    'group' => $meta['group'],
                    'value' => $value,
                ]
            );
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    private function settingMeta(): array
    {
        return [
            'site_name' => ['label' => 'Site Name', 'group' => 'general'],
            'site_logo' => ['label' => 'Site Logo', 'group' => 'general'],
            'sidebar_logo' => ['label' => 'Sidebar Logo', 'group' => 'general'],
            'admin_sidebar_logo' => ['label' => 'Admin Sidebar Logo', 'group' => 'general'],
            'admin_sidebar_title' => ['label' => 'Admin Sidebar Title', 'group' => 'general'],
            'contact_email' => ['label' => 'Contact Email', 'group' => 'general'],
            'contact_phone' => ['label' => 'Contact Phone', 'group' => 'general'],
            'user_login_enabled' => ['label' => 'Allow User Login', 'group' => 'security'],
            'user_registration_enabled' => ['label' => 'Allow User Registration', 'group' => 'security'],
            'otp_enabled' => ['label' => 'Require OTP for User Login', 'group' => 'security'],
            'otp_enabled_admin' => ['label' => 'Require OTP for Admin Login', 'group' => 'security'],
            'user_sms_otp_enabled' => ['label' => 'Enable SMS OTP for User Login', 'group' => 'security'],
            'user_email_otp_enabled' => ['label' => 'Enable Email OTP for User Login', 'group' => 'security'],
            'admin_sms_otp_enabled' => ['label' => 'Enable SMS OTP for Admin Login', 'group' => 'security'],
            'admin_email_otp_enabled' => ['label' => 'Enable Email OTP for Admin Login', 'group' => 'security'],
        ];
    }

    private function settingDefaults(): array
    {
        return [
            'site_name' => ['label' => 'Site Name', 'group' => 'general', 'value' => config('app.name')],
            'site_logo' => ['label' => 'Site Logo', 'group' => 'general', 'value' => ''],
            'sidebar_logo' => ['label' => 'Sidebar Logo', 'group' => 'general', 'value' => ''],
            'admin_sidebar_logo' => ['label' => 'Admin Sidebar Logo', 'group' => 'general', 'value' => ''],
            'admin_sidebar_title' => ['label' => 'Admin Sidebar Title', 'group' => 'general', 'value' => config('app.name')],
            'contact_email' => ['label' => 'Contact Email', 'group' => 'general', 'value' => ''],
            'contact_phone' => ['label' => 'Contact Phone', 'group' => 'general', 'value' => ''],
            'user_login_enabled' => ['label' => 'Allow User Login', 'group' => 'security', 'value' => '1'],
            'user_registration_enabled' => ['label' => 'Allow User Registration', 'group' => 'security', 'value' => '1'],
            'otp_enabled' => ['label' => 'Require OTP for User Login', 'group' => 'security', 'value' => '1'],
            'otp_enabled_admin' => ['label' => 'Require OTP for Admin Login', 'group' => 'security', 'value' => '1'],
            'user_sms_otp_enabled' => ['label' => 'Enable SMS OTP for User Login', 'group' => 'security', 'value' => '0'],
            'user_email_otp_enabled' => ['label' => 'Enable Email OTP for User Login', 'group' => 'security', 'value' => '1'],
            'admin_sms_otp_enabled' => ['label' => 'Enable SMS OTP for Admin Login', 'group' => 'security', 'value' => '0'],
            'admin_email_otp_enabled' => ['label' => 'Enable Email OTP for Admin Login', 'group' => 'security', 'value' => '1'],
        ];
    }

    private function deleteOldLogoFile(mixed $oldLogo): void
    {
        if (! is_string($oldLogo) || $oldLogo === '') {
            return;
        }

        if (! str_starts_with($oldLogo, '/upload/') && ! str_starts_with($oldLogo, '/storage/')) {
            return;
        }

        $resolvedPath = realpath(public_path(ltrim($oldLogo, '/')));
        if ($resolvedPath === false) {
            return;
        }

        $allowedRoots = array_filter([
            realpath(public_path('upload')),
            realpath(public_path('storage')),
        ]);

        $isAllowed = false;
        foreach ($allowedRoots as $root) {
            if ($resolvedPath === $root || str_starts_with($resolvedPath, $root . DIRECTORY_SEPARATOR)) {
                $isAllowed = true;
                break;
            }
        }

        if (! $isAllowed) {
            Log::warning('Blocked unsafe logo delete path', [
                'path' => $resolvedPath,
            ]);
            return;
        }

        try {
            if (File::exists($resolvedPath)) {
                File::delete($resolvedPath);
            }
        } catch (\Throwable $e) {
            Log::warning('Failed to delete old logo file', [
                'path' => $resolvedPath,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
