@extends('admin.layouts.app')

@section('header_title', 'Edit User')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Edit User: {{ $user->name }}</h5>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back me-sm-1"></i> <span class="d-none d-sm-inline-block">Back to List</span>
            </a>
        </div>
        <div class="card-body mt-4">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="user_type">User Type</label>
                        <select name="user_type" id="user_type" class="form-select" required>
                            <option value="user" {{ old('user_type', $user->user_type) == 'user' ? 'selected' : '' }}>
                                Customer (User)</option>
                            <option value="vendor" {{ old('user_type', $user->user_type) == 'vendor' ? 'selected' : '' }}>
                                Vendor</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="status">Account Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"
                            required onchange="toggleBanReason(this.value)">
                            <option value="active" {{ old('status', $user->status->value) === 'active' ? 'selected' : '' }}>
                                Active</option>
                            <option value="inactive"
                                {{ old('status', $user->status->value) === 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                            <option value="banned"
                                {{ old('status', $user->status->value) === 'banned' ? 'selected' : '' }}>Banned</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12" id="ban_reason_container"
                        style="display: {{ old('status', $user->status->value) === 'banned' ? 'block' : 'none' }};">
                        <label class="form-label" for="ban_reason">Ban Reason</label>
                        <textarea name="ban_reason" id="ban_reason" rows="2"
                            class="form-control @error('ban_reason') is-invalid @enderror">{{ old('ban_reason', $user->ban_reason) }}</textarea>
                        @error('ban_reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <span class="alert-icon text-info me-2">
                                <i class="bx bx-info-circle"></i>
                            </span>
                            Leave password blank to keep current password.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="password">New Password (optional)</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <div class="col-12 mt-4">
                        <h6 class="mb-3 border-bottom pb-2">Update Roles (Web Guard)</h6>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($roles as $role)
                                <div class="col">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content"
                                            for="role-{{ $role->id }}">
                                            <input class="form-check-input" type="checkbox" name="roles[]"
                                                value="{{ $role->name }}" id="role-{{ $role->id }}"
                                                {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                                            <span class="custom-option-header">
                                                <span class="h6 mb-0">{{ $role->label ?: $role->name }}</span>
                                                <small class="text-muted">Guard: {{ $role->guard_name }}</small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 pt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Update User</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-label-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleBanReason(status) {
            const container = document.getElementById('ban_reason_container');
            if (status === 'banned') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        }
    </script>
@endpush
