@extends('admin.layouts.app')

@section('header_title', 'Edit Permission Group')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Edit Permission Group: {{ $permissionGroup->label ?: $permissionGroup->name }}</h5>
            <a href="{{ route('admin.permission-groups.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back me-sm-1"></i> <span class="d-none d-sm-inline-block">Back to List</span>
            </a>
        </div>
        <div class="card-body mt-4">
            <form action="{{ route('admin.permission-groups.update', $permissionGroup) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Group Name (Slug)</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $permissionGroup->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="label">Display Label</label>
                        <input type="text" name="label" id="label" class="form-control"
                            value="{{ old('label', $permissionGroup->label) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="description">Description (Optional)</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $permissionGroup->description) }}</textarea>
                    </div>

                    <div class="col-12 pt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Update Group</button>
                        <a href="{{ route('admin.permission-groups.index') }}" class="btn btn-label-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
