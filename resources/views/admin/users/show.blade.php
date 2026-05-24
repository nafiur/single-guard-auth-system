@extends('admin.layouts.app')

@section('header_title', 'User Details')

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-user-view.css') }}" />
@endpush

@section('content')
    <div class="row gy-4">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            @php
                                $initial = substr($user->name, 0, 1);
                                $badgeType = $user->user_type === 'vendor' ? 'warning' : 'info';
                            @endphp
                            <div class="avatar avatar-xl my-4">
                                <span
                                    class="avatar-initial rounded-circle bg-label-{{ $badgeType }} fs-1">{{ $initial }}</span>
                            </div>
                            <div class="user-info text-center">
                                <h5 class="mb-2">{{ $user->name }}</h5>
                                <span class="badge bg-label-secondary">{{ ucfirst($user->user_type) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                        <div class="d-flex align-items-start me-4 mt-3 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-check bx-sm"></i></span>
                            <div>
                                <h5 class="mb-0">{{ $user->roles->count() }}</h5>
                                <span>Roles Assigned</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3 gap-3">
                            <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-log-in bx-sm"></i></span>
                            <div>
                                <h5 class="mb-0">{{ $user->loginHistories->count() }}</h5>
                                <span>Total Logins</span>
                            </div>
                        </div>
                    </div>
                    <h5 class="pb-2 border-bottom mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-bold me-2">Email:</span>
                                <span>{{ $user->email }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Status:</span>
                                @php
                                    $statusClass =
                                        $user->status->value === 'active'
                                            ? 'success'
                                            : ($user->status->value === 'inactive'
                                                ? 'warning'
                                                : 'danger');
                                @endphp
                                <span class="badge bg-label-{{ $statusClass }}">{{ $user->status->label() }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Role:</span>
                                <span>{{ $user->roles->pluck('name')->implode(', ') ?: 'N/A' }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Verified:</span>
                                <span class="badge bg-label-{{ $user->email_verified_at ? 'success' : 'danger' }}">
                                    {{ $user->email_verified_at ? 'Yes' : 'No' }}
                                </span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">User Type:</span>
                                <span class="text-capitalize">{{ $user->user_type }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Last Login:</span>
                                <span>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</span>
                            </li>
                        </ul>
                        @if ($user->status->value === 'banned')
                            <div class="alert alert-danger mt-3 mb-0 p-3">
                                <h6 class="alert-heading mb-1 fw-bold">Ban Reason</h6>
                                <span>{{ $user->ban_reason ?: 'No reason provided.' }}</span>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center pt-3 mt-4 border-top">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary me-3">Edit Details</a>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-label-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Tabs -->
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Account &
                        Activity</a>
                </li>
            </ul>
            <!--/ User Tabs -->

            <!-- Recent Activity -->
            <div class="card mb-4 text-break">
                <h5 class="card-header border-bottom">Recent Activity Log</h5>
                <div class="card-body mt-4">
                    <ul class="timeline">
                        @php
                            $activities = \App\Models\ActivityLog::where(function ($q) use ($user) {
                                $q->where('causer_type', 'App\Models\User')->where('causer_id', $user->id);
                            })
                                ->orWhere(function ($q) use ($user) {
                                    $q->where('subject_type', 'App\Models\User')->where('subject_id', $user->id);
                                })
                                ->latest()
                                ->take(10)
                                ->get();
                        @endphp
                        @forelse($activities as $activity)
                            <li class="timeline-item timeline-item-transparent">
                                @php
                                    $dotColor = match ($activity->event) {
                                        'created' => 'success',
                                        'updated' => 'warning',
                                        'deleted' => 'danger',
                                        default => 'primary',
                                    };
                                @endphp
                                <span class="timeline-point timeline-point-{{ $dotColor }}"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0 text-capitalize">{{ $activity->event }}:
                                            {{ $activity->description }}
                                        </h6>
                                        <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-2">
                                        @if ($activity->causer && $activity->causer_id !== $user->id)
                                            By {{ $activity->causer->name }}
                                            ({{ class_basename($activity->causer_type) }})
                                        @elseif($activity->causer_id === $user->id)
                                            Action performed by the user
                                        @else
                                            System Action
                                        @endif
                                    </p>
                                </div>
                            </li>
                        @empty
                            <li class="text-center py-4 text-muted border-0 list-unstyled">No recent activity logged.</li>
                        @endforelse
                        <li class="timeline-end-indicator">
                            <i class="bx bx-check-circle"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Recent Activity -->

            <!-- Login History -->
            <div class="card">
                <h5 class="card-header border-bottom">Device Login History (Last 10)</h5>
                <div class="table-responsive">
                    <table class="table table-hover border-top">
                        <thead>
                            <tr>
                                <th>IP Address</th>
                                <th>Browser / Device</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user->loginHistories()->latest('login_at')->take(10)->get() as $history)
                                <tr>
                                    <td><code class="bg-label-secondary px-2 rounded">{{ $history->ip_address }}</code>
                                    </td>
                                    <td class="text-truncate" style="max-width: 300px;" title="{{ $history->user_agent }}">
                                        {{ Str::limit($history->user_agent, 60) }}
                                    </td>
                                    <td>{{ $history->login_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">No login history recorded.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Login History -->
        </div>
        <!--/ User Content -->
    </div>
@endsection
