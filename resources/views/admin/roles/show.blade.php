@extends('admin.layouts.app')

@section('header_title', 'Role Details')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5 class="card-title mb-0">Role Details</h5>
                <small class="text-muted">Detailed information for {{ $role->label ?: $role->name }}</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-label-secondary">
                    <i class="bx bx-arrow-back me-1"></i>Back
                </a>
                @can('edit-roles', 'web')
                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary">
                        <i class="bx bx-edit-alt me-1"></i>Edit
                    </a>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <div class="row gy-4">
                <div class="col-lg-3 fw-medium text-muted">Role Name</div>
                <div class="col-lg-9">
                    <span class="badge bg-label-primary">{{ $role->name }}</span>
                </div>

                <div class="col-lg-3 fw-medium text-muted">Label</div>
                <div class="col-lg-9">
                    {{ $role->label ?: '—' }}
                </div>

                <div class="col-lg-3 fw-medium text-muted">Guard</div>
                <div class="col-lg-9">
                    <span class="badge bg-label-info">{{ $role->guard_name }}</span>
                </div>

                <div class="col-lg-3 fw-medium text-muted">Description</div>
                <div class="col-lg-9">
                    {{ $role->description ?: 'No description provided.' }}
                </div>
            </div>

            <hr class="my-4">

            <h6 class="mb-3">Assigned Permissions</h6>
            <div class="d-flex flex-wrap gap-2">
                @forelse($role->permissions as $permission)
                    <span class="badge bg-label-success">{{ $permission->label ?: $permission->name }}</span>
                @empty
                    <span class="text-muted">No permissions assigned to this role.</span>
                @endforelse
            </div>
        </div>
    </div>
@endsection
