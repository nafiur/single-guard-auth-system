@extends('admin.layouts.app')

@section('header_title', 'Create Administrator')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Create New Administrator</h5>
            <a href="{{ route('admin.administrators.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back me-sm-1"></i> <span class="d-none d-sm-inline-block">Back to List</span>
            </a>
        </div>
        <div class="card-body mt-4">
            <form action="{{ route('admin.administrators.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="John Doe">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required placeholder="johndoe">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="john@example.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="status">Account Status</label>
                        <select name="status" id="status" class="form-select" required onchange="toggleBanReason(this.value)">
                            <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="banned" {{ old('status') === 'banned' ? 'selected' : '' }}>Banned</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12" id="ban_reason_container" style="display: {{ old('status') === 'banned' ? 'block' : 'none' }};">
                        <label class="form-label" for="ban_reason">Ban Reason</label>
                        <textarea name="ban_reason" id="ban_reason" rows="2" class="form-control @error('ban_reason') is-invalid @enderror" placeholder="Why is this account being banned?">{{ old('ban_reason') }}</textarea>
                        @error('ban_reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <div class="col-12 mt-4">
                        <h6 class="mb-3 border-bottom pb-2">Assign Roles</h6>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($roles as $role)
                                <div class="col">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content" for="role-{{ $role->id }}">
                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role-{{ $role->id }}">
                                            <span class="custom-option-header">
                                                <span class="h6 mb-0">{{ $role->label ?: $role->name }}</span>
                                                <small class="text-muted">Guard: {{ $role->guard_name }}</small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($roles->isEmpty())
                            <p class="text-muted italic">No admin roles available. Create some in the Roles section first.</p>
                        @endif
                    </div>

                    <div class="col-12 pt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Save Administrator</button>
                        <a href="{{ route('admin.administrators.index') }}" class="btn btn-label-secondary">Cancel</a>
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
