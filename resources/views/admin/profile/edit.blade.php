@extends('admin.layouts.app')

@section('header_title', 'Account Settings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#admin-account-tab">
                        <i class="bx bx-user me-1"></i> Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#admin-security-tab">
                        <i class="bx bx-lock-alt me-1"></i> Security
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="javascript:void(0);">
                        <i class="bx bx-bell me-1"></i> Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="javascript:void(0);">
                        <i class="bx bx-link-alt me-1"></i> Connections
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="admin-account-tab">
                    <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img id="adminAvatarPreview" src="{{ $user->profile_image ? url('upload/admins/' . $user->profile_image) : asset('backend/assets/img/avatars/1.png') }}"
                                    alt="Profile Photo" class="d-block rounded" style="height: 100px; width: 100px; object-fit: cover; border-radius: 0.75rem;">

                                <div class="button-wrapper">
                                    <label for="adminAvatarInput" class="btn btn-primary me-2 mb-2" tabindex="0">
                                        <span>Upload new photo</span>
                                        <input id="adminAvatarInput" class="d-none" type="file" name="avatar" form="adminProfileForm"
                                            accept="image/*">
                                    </label>
                                    <button type="button" id="adminAvatarReset" class="btn btn-label-secondary mb-2">
                                        Reset
                                    </button>

                                    <p class="mb-0 text-muted small">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <i class="bx bx-check-circle me-1"></i>{{ session('success') }}
                                </div>
                            @endif

                            <form id="adminProfileForm" method="post" action="{{ route('admin.profile.update') }}"
                                enctype="multipart/form-data" class="row g-3">
                                @csrf
                                @method('patch')

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ old('name', $user->name) }}" autofocus required>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div class="mt-2 rounded border border-warning bg-warning bg-opacity-10 p-2">
                                            <div class="text-warning small">
                                                Your email address is unverified.
                                                <a href="{{ route('admin.verification.notice') }}"
                                                    class="ms-2 text-decoration-underline">Go to Verify</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @error('avatar')
                                    <div class="col-12">
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    </div>
                                @enderror

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="admin-security-tab">
                    <div class="card">
                        <h5 class="card-header">Change Password</h5>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <i class="bx bx-check-circle me-1"></i>{{ session('success') }}
                                </div>
                            @endif

                            <form method="post" action="{{ route('admin.password.update') }}" class="row g-3">
                                @csrf
                                @method('put')

                                <div class="mb-3 col-md-4">
                                    <label for="update_password_current_password" class="form-label">Current Password</label>
                                    <input class="form-control" type="password" id="update_password_current_password" name="current_password"
                                        autocomplete="current-password">
                                    @error('current_password', 'updatePassword')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="update_password_password" class="form-label">New Password</label>
                                    <input class="form-control" type="password" id="update_password_password" name="password"
                                        autocomplete="new-password">
                                    @error('password', 'updatePassword')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" id="update_password_password_confirmation"
                                        name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation', 'updatePassword')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const defaultAvatar = "{{ $user->profile_image ? url('upload/admins/' . $user->profile_image) : asset('backend/assets/img/avatars/1.png') }}";
        const adminAvatarInput = document.getElementById('adminAvatarInput');
        const adminAvatarPreview = document.getElementById('adminAvatarPreview');
        const adminAvatarReset = document.getElementById('adminAvatarReset');

        if (adminAvatarInput && adminAvatarPreview) {
            adminAvatarInput.addEventListener('change', function (event) {
                const file = event.target.files && event.target.files[0];

                if (!file) {
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    adminAvatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        }

        if (adminAvatarReset) {
            adminAvatarReset.addEventListener('click', function () {
                if (adminAvatarInput) {
                    adminAvatarInput.value = '';
                }
                if (adminAvatarPreview) {
                    adminAvatarPreview.src = defaultAvatar;
                }
            });
        }
    </script>
@endsection
