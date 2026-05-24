@extends('admin.layouts.app')

@section('header_title', 'Activity Log Details')

@push('css')
    <style>
        .code-block {
            max-height: 360px;
            overflow: auto;
            background: #0f172a;
            color: #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.75rem 0.9rem;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('admin.activity-logs.index') }}" class="btn btn-label-secondary btn-sm">
                <i class="bx bx-arrow-left me-1"></i>Back to Logs
            </a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-start flex-wrap gap-2">
                    <div>
                        <h5 class="mb-1">Activity #{{ $activityLog->id }}</h5>
                        <p class="mb-0 text-muted">
                            Recorded on {{ $activityLog->created_at ? $activityLog->created_at->format('F d, Y \a\t h:i A') : 'N/A' }}
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="badge bg-label-secondary">Log: {{ ucfirst($activityLog->log_name) }}</span>
                        @php
                            $eventClass =
                                $activityLog->event === 'deleted'
                                    ? 'danger'
                                    : ($activityLog->event === 'updated' ? 'warning' : 'success');
                        @endphp
                        <span class="badge bg-label-{{ $eventClass }}">Event: {{ ucfirst($activityLog->event) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mt-4">
            <div class="card h-100">
                <h5 class="card-header">Causer Information</h5>
                <div class="card-body">
                    @if ($activityLog->causer)
                        <div class="mb-2">
                            <div class="fw-semibold">{{ $activityLog->causer->name ?? $activityLog->causer->username }}</div>
                            <div class="text-muted small">Type: {{ class_basename($activityLog->causer_type) }}</div>
                            <div class="text-muted small">ID: {{ $activityLog->causer_id }}</div>
                        </div>
                        <div class="small">Email: {{ $activityLog->causer->email ?? 'N/A' }}</div>
                    @else
                        <div class="text-muted fst-italic">System / Automated Process</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mt-4">
            <div class="card h-100">
                <h5 class="card-header">Subject Information</h5>
                <div class="card-body">
                    @if ($activityLog->subject)
                        <div class="mb-2">
                            @php
                                $subjectName = $activityLog->subject->name ?? ($activityLog->subject->label ?? ($activityLog->subject->username ?? 'N/A'));
                            @endphp
                            <div class="fw-semibold">{{ $subjectName }}</div>
                            <div class="text-muted small">Type: {{ class_basename($activityLog->subject_type) }}</div>
                            <div class="text-muted small">ID: {{ $activityLog->subject_id ?? 'N/A' }}</div>
                        </div>
                    @else
                        <div class="fw-semibold text-danger">Resource Deleted / Unavailable</div>
                        <div class="text-muted small">Type: {{ $activityLog->subject_type ? class_basename($activityLog->subject_type) : 'N/A' }}</div>
                        <div class="text-muted small">ID: {{ $activityLog->subject_id ?? 'N/A' }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card">
                <h5 class="card-header">Description</h5>
                <div class="card-body">
                    <p class="mb-0">{{ $activityLog->description ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        @if ($activityLog->properties && count($activityLog->properties) > 0)
            <div class="col-12 mt-4">
                <div class="card">
                    <h5 class="card-header">
                        Change Details
                    </h5>
                    <div class="card-body">
                        @if (isset($activityLog->properties['old']))
                            <div class="mb-4">
                                <h6 class="text-muted">Previous State</h6>
                                <pre class="code-block mb-0">{{ json_encode($activityLog->properties['old'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                        @endif

                        @if (isset($activityLog->properties['attributes']))
                            <div>
                                <h6 class="text-muted">{{ isset($activityLog->properties['old']) ? 'New State' : 'Attributes' }}</h6>
                                <pre class="code-block mb-0">{{ json_encode($activityLog->properties['attributes'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                        @endif

                        @if (!isset($activityLog->properties['old']) && !isset($activityLog->properties['attributes']))
                            <div>
                                <h6 class="text-muted">Properties</h6>
                                <pre class="code-block mb-0">{{ json_encode($activityLog->properties, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="col-12 mt-4">
                <div class="alert alert-secondary">No properties attached to this activity.</div>
            </div>
        @endif
    </div>
@endsection
