@extends('admin.layouts.app')

@section('header_title', 'Permission Details')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5 class="card-title mb-0">Permission Details</h5>
                <small class="text-muted">Detailed information for {{ $permission->label ?: $permission->name }}</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-label-secondary">
                    <i class="bx bx-arrow-back me-1"></i>Back
                </a>
                @can('edit-permissions', 'web')
                    <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-primary">
                        <i class="bx bx-edit-alt me-1"></i>Edit
                    </a>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <div class="row gy-4">
                <div class="col-lg-3 fw-medium text-muted">Module</div>
                <div class="col-lg-9">{{ $permission->module }}</div>

                <div class="col-lg-3 fw-medium text-muted">Group</div>
                <div class="col-lg-9">{{ $permission->group->name ?? 'None' }}</div>

                <div class="col-lg-3 fw-medium text-muted">Guard</div>
                <div class="col-lg-9">
                    <span class="badge bg-label-info">{{ $permission->guard_name }}</span>
                </div>

                <div class="col-lg-3 fw-medium text-muted">Label</div>
                <div class="col-lg-9">{{ $permission->label ?: $permission->name }}</div>

                <div class="col-lg-3 fw-medium text-muted">Name</div>
                <div class="col-lg-9">{{ $permission->name }}</div>

                <div class="col-lg-3 fw-medium text-muted">Description</div>
                <div class="col-lg-9">{{ $permission->description ?: 'No description provided.' }}</div>
            </div>
        </div>
    </div>
@endsection
