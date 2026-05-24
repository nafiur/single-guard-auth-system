@extends('admin.layouts.app')

@section('header_title', 'Create Permission')

@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Create New Permission</h5>
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back me-sm-1"></i> <span class="d-none d-sm-inline-block">Back to List</span>
            </a>
        </div>
        <div class="card-body mt-4">
            <form action="{{ route('admin.permissions.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Permission Name (Slug)</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                            placeholder="e.g. view-users">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="label">Display Label</label>
                        <input type="text" name="label" id="label" class="form-control" value="{{ old('label') }}"
                            placeholder="e.g. View Users">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="module">Module</label>
                        <input type="text" name="module" id="module" class="form-control" value="{{ old('module') }}"
                            required placeholder="e.g. User Management">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="group_id">Permission Group</label>
                        <select name="group_id" id="group_id" class="form-select select2">
                            <option value="">None</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                    {{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="guard_name">Guard Name</label>
                        <select name="guard_name" id="guard_name" class="form-select" required>
                            <option value="admin" {{ old('guard_name') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="web" {{ old('guard_name') == 'web' ? 'selected' : '' }}>Web</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control"
                            placeholder="Explain what this permission allows...">{{ old('description') }}</textarea>
                    </div>

                    <div class="col-12 pt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Save Permission</button>
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-label-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
