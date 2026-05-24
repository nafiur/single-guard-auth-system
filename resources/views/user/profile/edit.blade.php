@extends('user.layouts.app')

@section('title', 'My Profile | Aritreek')

@section('content')
    <div class="dashboard-header animate-fade">
        <h1 class="dashboard-title">Account Settings</h1>
        <p class="dashboard-subtitle">Manage your personal information, security, and account preferences.</p>
    </div>

    <div style="max-width: 900px; margin: 0 auto;" class="animate-fade" style="animation-delay: 0.1s;">
        <!-- Profile Information -->
        <div class="card" style="margin-bottom: 2rem;">
            <div style="margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
                <h2 style="font-size: 1.25rem; font-weight: 700;">Profile Information</h2>
                <p style="color: var(--text-muted); font-size: 0.875rem;">Update your account's profile information and
                    email address.</p>
            </div>



            @if (session('success'))
                <div
                    style="margin-bottom: 1.5rem; padding: 1rem; background-color: #dcfce7; color: #15803d; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
                    <div id="userAvatarPreviewWrap"
                        style="width: 72px; height: 72px; border-radius: 9999px; overflow: hidden; background: #e2e8f0; display: flex; align-items: center; justify-content: center;">
                        @if ($user->profile_image)
                            <img id="userAvatarPreview" src="{{ url('upload/users/' . $user->profile_image) }}" alt="Profile Photo"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span id="userAvatarFallback" style="font-weight: 700; color: #64748b; font-size: 1.5rem;">
                                {{ substr($user->name, 0, 1) }}
                            </span>
                        @endif
                    </div>
                    <div>
                        <label for="avatarInput" style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">Profile
                            Photo</label>
                        <input id="avatarInput" type="file" name="avatar" accept="image/*"
                            style="max-width: 320px; width: 100%;">
                        @error('avatar')
                            <p style="color: var(--danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label for="name"
                            style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">Full
                            Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                            autofocus
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.5rem; font-size: 0.9375rem;">
                        @error('name')
                            <p style="color: var(--danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email"
                            style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">Email
                            Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            required
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.5rem; font-size: 0.9375rem;">
                        @error('email')
                            <p style="color: var(--danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div
                                style="margin-top: 1rem; padding: 0.75rem; background-color: #fffbeb; border: 1px solid #fef3c7; border-radius: 0.5rem;">
                                <p style="font-size: 0.8125rem; color: #92400e;">
                                    Your email address is unverified.
                                    <button form="send-verification"
                                        style="color: var(--primary); font-weight: 600; border: none; background: none; cursor: pointer; text-decoration: underline;">
                                        Click here to re-send the verification email.
                                    </button>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
        </div>

        <!-- Update Password -->
        <div class="card" style="margin-bottom: 2rem;">
            <div style="margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
                <h2 style="font-size: 1.25rem; font-weight: 700;">Update Password</h2>
                <p style="color: var(--text-muted); font-size: 0.875rem;">Ensure your account is using a long, random
                    password to stay secure.</p>
            </div>



            @if (session('password_success'))
                <div
                    style="margin-bottom: 1.5rem; padding: 1rem; background-color: #dcfce7; color: #15803d; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600;">
                    ✓ {{ session('password_success') }}
                </div>
            @endif



            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div style="margin-bottom: 1.5rem;">
                    <label for="current_password"
                        style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">Current
                        Password</label>
                    <input type="password" id="current_password" name="current_password"
                        style="width: 100%; max-width: 400px; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.5rem; font-size: 0.9375rem;">
                    @error('current_password', 'updatePassword')
                        <p style="color: var(--danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label for="password"
                            style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">New
                            Password</label>
                        <input type="password" id="password" name="password"
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.5rem; font-size: 0.9375rem;">
                        @error('password', 'updatePassword')
                            <p style="color: var(--danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation"
                            style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.5rem; font-size: 0.9375rem;">
                        @error('password_confirmation', 'updatePassword')
                            <p style="color: var(--danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>

        <!-- Danger Zone -->
        <div class="card" style="border-color: #fee2e2;">
            <div style="margin-bottom: 2rem; border-bottom: 1px solid #fee2e2; padding-bottom: 1rem;">
                <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--danger);">Danger Zone</h2>
                <p style="color: var(--text-muted); font-size: 0.875rem;">Once your account is deleted, all of its resources
                    and data will be permanently deleted.</p>
            </div>

            <button type="button" class="btn" style="background-color: #fee2e2; color: var(--danger); border: none;"
                onclick="showDeleteModal()">
                Delete Account
            </button>
        </div>
    </div>

    <!-- Simple Modal Backdrop -->
    <div id="deleteModal"
        style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center; padding: 1rem;">
        <div class="card animate-fade" style="width: 100%; max-width: 500px; padding: 2rem;">
            <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1rem;">Are you sure?</h3>
            <p style="color: var(--text-muted); font-size: 0.9375rem; margin-bottom: 1.5rem;">Please enter your password to
                confirm you would like to permanently delete your account.</p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <input type="password" name="password" placeholder="Confirm Password" required
                    style="width: 100%; padding: 0.75rem; border: 1px solid var(--border); border-radius: 0.5rem; margin-bottom: 1.5rem;">

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button" class="btn" style="background: none; border: 1px solid var(--border);"
                        onclick="hideDeleteModal()">Cancel</button>
                    <button type="submit" class="btn"
                        style="background-color: var(--danger); color: white; border: none;">Delete Permanently</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const avatarInput = document.getElementById('avatarInput');
        const avatarPreview = document.getElementById('userAvatarPreview');
        const avatarFallback = document.getElementById('userAvatarFallback');
        const avatarContainer = document.getElementById('userAvatarPreviewWrap');

        if (avatarInput) {
            avatarInput.addEventListener('change', function (event) {
                const file = event.target.files && event.target.files[0];

                if (!file) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (e) {
                    if (avatarPreview) {
                        avatarPreview.src = e.target.result;
                    } else {
                        const newImage = document.createElement('img');
                        newImage.id = 'userAvatarPreview';
                        newImage.src = e.target.result;
                        newImage.alt = 'Profile Photo';
                        newImage.style.width = '100%';
                        newImage.style.height = '100%';
                        newImage.style.objectFit = 'cover';
                        avatarFallback?.remove();
                        avatarContainer.appendChild(newImage);
                    }
                };

                reader.readAsDataURL(file);
            });
        }

        function showDeleteModal() {
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>
@endsection
