@extends('admin.layouts.app')

@section('header_title', 'Permission Group Details')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5 class="card-title mb-0">Permission Group Details</h5>
                <small class="text-muted">Detailed information for {{ $permissionGroup->name }}</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.permission-groups.index') }}" class="btn btn-label-secondary">
                    <i class="bx bx-arrow-back me-1"></i>Back
                </a>
                @can('edit-permission-groups', 'web')
                    <a href="{{ route('admin.permission-groups.edit', $permissionGroup) }}" class="btn btn-primary">
                        <i class="bx bx-edit-alt me-1"></i>Edit
                    </a>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <div class="row gy-4">
                <div class="col-lg-3 fw-medium text-muted">Name</div>
                <div class="col-lg-9">{{ $permissionGroup->name }}</div>

                <div class="col-lg-3 fw-medium text-muted">Label</div>
                <div class="col-lg-9">{{ $permissionGroup->label }}</div>

                <div class="col-lg-3 fw-medium text-muted">Description</div>
                <div class="col-lg-9">{{ $permissionGroup->description ?: 'No description provided.' }}</div>

                <div class="col-lg-3 fw-medium text-muted">Status</div>
                <div class="col-lg-9">
                    <span class="badge bg-label-success">Active</span>
                </div>
            </div>
        </div>
    </div>
@endsection
