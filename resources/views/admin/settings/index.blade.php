@extends('admin.layouts.app')

@section('header_title', 'Account Settings')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="mb-0">
                <i class="bx bx-cog me-2"></i>
                Account Settings
            </h5>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @php
                $boolSettings = [
                    'user_login_enabled',
                    'user_registration_enabled',
                    'otp_enabled',
                    'otp_enabled_admin',
                    'user_sms_otp_enabled',
                    'user_email_otp_enabled',
                    'admin_sms_otp_enabled',
                    'admin_email_otp_enabled',
                ];
                $groups = $settings->keys()->values();
                $activeGroup = $groups->first();
            @endphp

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    @foreach ($groups as $group)
                        @php
                            $groupId = 'settings-' . strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $group)));
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }} d-flex align-items-center"
                                data-bs-toggle="tab" href="#{{ $groupId }}">
                                <i class="bx bx-layer me-1"></i>
                                <span class="text-capitalize">{{ $group }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach ($settings as $group => $groupSettings)
                        @php
                            $groupId = 'settings-' . strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $group)));
                        @endphp
                        <div class="tab-pane fade {{ $group === $activeGroup ? 'show active' : '' }}" id="{{ $groupId }}"
                            role="tabpanel">
                            <div class="card border mb-4">
                                <div class="card-header py-3 bg-label-secondary">
                                    <h6 class="mb-0 text-uppercase text-muted fw-bold">
                                        {{ $group }} Settings
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        @foreach ($groupSettings as $setting)
                                            @php
                                                $isBooleanSetting = in_array($setting->key, $boolSettings, true);
                                                $isImageSetting = in_array($setting->key, ['site_logo', 'sidebar_logo', 'admin_sidebar_logo'], true);
                                                $currentValue = old($setting->key, $setting->value);
                                                $isChecked = in_array(strtolower((string) $currentValue), ['1', 'true', 'on', 'yes', 'y'], true);
                                                $isLarge = strlen((string) $setting->value) > 120;
                                                $fieldId = str('settings_' . $setting->key)->slug('_');
                                            @endphp
                                            <div class="{{ $isImageSetting ? 'col-12' : ($isLarge ? 'col-12' : 'col-md-6') }}">
                                                @if ($isImageSetting)
                                                    <label for="{{ $fieldId }}" class="form-label">{{ $setting->label }}</label>
                                                    <small class="text-muted d-block mb-2">{{ $setting->key }}</small>

                                                    <div class="mb-3" id="{{ $fieldId }}_preview_wrapper" style="{{ !empty($currentValue) ? '' : 'display: none;' }}">
                                                        <img id="{{ $fieldId }}_preview"
                                                            src="{{ !empty($currentValue) ? asset($currentValue) : '' }}"
                                                            alt="{{ $setting->label }}" class="img-fluid rounded border"
                                                            style="max-height: 120px;">
                                                    </div>

                                                    <input class="form-control" type="file" id="{{ $fieldId }}"
                                                        name="{{ $setting->key }}" accept="image/*"
                                                        data-preview="{{ $fieldId }}_preview"
                                                        data-preview-wrapper="{{ $fieldId }}_preview_wrapper">
                                                    <div class="form-text">Upload JPG, PNG, GIF বা WebP (max 2MB).</div>
                                                @elseif ($isBooleanSetting)
                                                    <div class="d-flex justify-content-between align-items-center border rounded-3 px-3 py-2">
                                                        <div>
                                                            <label for="{{ $fieldId }}" class="form-label mb-0 d-block">{{ $setting->label }}</label>
                                                            <small class="text-muted">{{ $setting->key }}</small>
                                                        </div>
                                                        <div class="form-check form-switch mb-0">
                                                            <input type="hidden" name="{{ $setting->key }}" value="0">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="{{ $setting->key }}" id="{{ $fieldId }}"
                                                                value="1" {{ $isChecked ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                @elseif ($isLarge)
                                                    <label for="{{ $fieldId }}" class="form-label">{{ $setting->label }}</label>
                                                    <small class="text-muted d-block mb-1">{{ $setting->key }}</small>
                                                    <textarea class="form-control" name="{{ $setting->key }}" id="{{ $fieldId }}"
                                                        rows="4">{{ old($setting->key, $setting->value) }}</textarea>
                                                @else
                                                    <label for="{{ $fieldId }}" class="form-label">{{ $setting->label }}</label>
                                                    <small class="text-muted d-block mb-1">{{ $setting->key }}</small>
                                                    <input type="text" class="form-control" name="{{ $setting->key }}"
                                                        id="{{ $fieldId }}" placeholder="{{ $setting->label }}"
                                                        value="{{ old($setting->key, $setting->value) }}">
                                                @endif
                                            </div>
                                        @endforeach

                                        <div class="col-12">
                                            <div class="alert alert-secondary d-flex align-items-center mb-0">
                                                <i class="bx bx-info-circle me-2"></i>
                                                <span>Settings in this group are saved together with all others.</span>
                                            </div>
                                        </div>
                                    </div>

                                    @can('update-settings', 'web')
                                        <div class="mt-4 d-flex justify-content-end gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bx bx-save me-1"></i> Save {{ ucfirst($group) }} Settings
                                            </button>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[type="file"][data-preview]').forEach((input) => {
            const preview = document.getElementById(input.dataset.preview);
            const previewWrapper = document.getElementById(input.dataset.previewWrapper);

            input.addEventListener('change', function (event) {
                const file = event.target.files && event.target.files[0];

                if (!file || !preview) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    if (previewWrapper) {
                        previewWrapper.style.display = 'block';
                    }
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
