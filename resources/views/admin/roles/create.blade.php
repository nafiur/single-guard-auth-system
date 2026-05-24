@extends('admin.layouts.app')

@section('header_title', 'Create Role')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Create New Role</h5>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back me-sm-1"></i> <span class="d-none d-sm-inline-block">Back to List</span>
            </a>
        </div>
        <div class="card-body mt-4">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Role Name (Slug)</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                            placeholder="e.g. manager">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="label">Display Label</label>
                        <input type="text" name="label" id="label" class="form-control" value="{{ old('label') }}"
                            placeholder="e.g. Manager">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="guard_name">Guard Name</label>
                        <select name="guard_name" id="guard_name"
                            class="form-select @error('guard_name') is-invalid @enderror" required>
                            <option value="admin" {{ old('guard_name') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="web" {{ old('guard_name') == 'web' ? 'selected' : '' }}>Web</option>
                        </select>
                        @error('guard_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="description">Description (Optional)</label>
                        <textarea name="description" id="description" rows="1" class="form-control"
                            placeholder="Optional brief description">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <h5 class="mb-4 border-bottom pb-2">Assign Permissions</h5>

                    @forelse ($permissions as $groupName => $groupPermissions)
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-3 bg-label-primary p-2 rounded">
                                <i class="bx bx-folder me-1"></i> {{ $groupName }}
                            </h6>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 ms-1">
                                @foreach ($groupPermissions as $permission)
                                    <div class="col">
                                        <div class="form-check custom-option custom-option-basic">
                                            <label class="form-check-label custom-option-content"
                                                for="perm-{{ $permission->id }}">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    value="{{ $permission->name }}" id="perm-{{ $permission->id }}">
                                                <span class="custom-option-header">
                                                    <span
                                                        class="h6 mb-0">{{ $permission->label ?: $permission->name }}</span>
                                                </span>
                                                <small class="text-muted d-block mt-1">{{ $permission->name }}</small>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted italic">No permissions available. Create some first.</p>
                        </div>
                    @endforelse
                </div>

                <div class="col-12 pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Save Role</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-label-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
