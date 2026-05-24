@extends('admin.layouts.app')

@section('header_title', 'Dashboard Overview')

@section('content')
    @php
        $stats = [
            ['title' => 'Administrators', 'value' => \App\Models\User::where('user_type', 'admin')->count(), 'icon' => 'bx-user-pin', 'class' => 'primary', 'route' => route('admin.administrators.index')],
            ['title' => 'Total Users', 'value' => \App\Models\User::count(), 'icon' => 'bx-user', 'class' => 'success', 'route' => route('admin.users.index')],
            ['title' => 'Active Roles', 'value' => \Spatie\Permission\Models\Role::where('guard_name', 'web')->count(), 'icon' => 'bx-check-shield', 'class' => 'warning', 'route' => route('admin.roles.index')],
            ['title' => 'Permissions', 'value' => \Spatie\Permission\Models\Permission::count(), 'icon' => 'bx-key', 'class' => 'info', 'route' => route('admin.permissions.index')],
        ];

        $recentAdmins = \App\Models\User::where('user_type', 'admin')->latest()->take(4)->get(['id', 'name', 'email']);
        $recentUsers = \App\Models\User::latest()->take(4)->get(['id', 'name', 'email']);

        $activityLogsLast7Days = \App\Models\ActivityLog::query()
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total', 'day')
            ->toArray();

        $labels = [];
        $values = [];
        $maxLog = 1;
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $labels[] = now()->subDays($i)->format('D');
            $value = (int) ($activityLogsLast7Days[$date] ?? 0);
            $values[] = $value;
            $maxLog = max($maxLog, $value);
        }

        $recentActivities = \App\Models\ActivityLog::latest()->with(['causer', 'subject'])->take(8)->get();
    @endphp

    <div class="row g-4 mb-4">
        @foreach ($stats as $stat)
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <p class="text-muted mb-1">{{ $stat['title'] }}</p>
                                <h4 class="mb-0">{{ $stat['value'] }}</h4>
                            </div>
                            <span class="badge bg-label-{{ $stat['class'] }} rounded p-2">
                                <i class="bx {{ $stat['icon'] }} bx-sm"></i>
                            </span>
                        </div>
                        <div class="mt-3">
                            <a href="{{ $stat['route'] }}" class="small text-muted">View details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="card">
                <h5 class="card-header">Activity Logs - Last 7 Days</h5>
                <div class="card-body">
                    <div class="d-flex align-items-end gap-3" style="height: 190px;">
                        @foreach ($labels as $index => $label)
                            @php
                                $value = $values[$index];
                                $height = $maxLog > 0 ? round(($value / $maxLog) * 130) : 0;
                                $barHeight = max(8, $height);
                            @endphp
                            <div class="flex-fill text-center">
                                <div class="position-relative w-100">
                                    <div class="position-absolute start-50 translate-middle-x bg-label-primary rounded-top"
                                        style="bottom: 0; height: {{ $barHeight }}px; width: 28px;" title="{{ $value }} logs"></div>
                                </div>
                                <div class="small text-muted mt-2">{{ $label }}</div>
                                <div class="small fw-medium">{{ $value }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <h5 class="card-header">Latest Activity Logs</h5>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @forelse ($recentActivities as $activity)
                            <a href="{{ route('admin.activity-logs.show', $activity) }}"
                                class="list-group-item list-group-item-action border-0 px-0">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <div class="fw-semibold text-truncate" style="max-width: 260px;"
                                            title="{{ $activity->description }}">
                                            {{ $activity->event ? ucfirst($activity->event) : 'Activity' }}:
                                            {{ \Illuminate\Support\Str::limit($activity->description, 45) }}
                                        </div>
                                        <small class="text-muted">
                                            {{ $activity->causer ? ($activity->causer->name ?? $activity->causer->username) : 'System' }}
                                            ({{ $activity->causer_type ? class_basename($activity->causer_type) : 'System' }})
                                        </small>
                                    </div>
                                    <small class="text-muted">{{ $activity->created_at?->diffForHumans() }}</small>
                                </div>
                            </a>
                        @empty
                            <div class="list-group-item border-0 px-0 text-muted">No activity found.</div>
                        @endforelse
                        <div class="list-group-item border-0 px-0 mt-2">
                            <a href="{{ route('admin.activity-logs.index') }}" class="small">View all activity logs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <h5 class="card-header">Quick Integration Guide</h5>
                <div class="card-body">
                    <p class="mb-3 text-muted">Use the following features to secure and manage your platform.</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <h6 class="mb-2">Authentication Hardening</h6>
                            <ul class="mb-0 ps-3">
                                <li>Generic responses for recovery requests.</li>
                                <li>Route-level throttling on sensitive actions.</li>
                                <li>Email verification required on sensitive pages.</li>
                                <li>Separate token tables for admin and users.</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-2">Access Control</h6>
                            <ul class="mb-0 ps-3">
                                <li>Dual-guard role and permission model.</li>
                                <li>Grouped permissions by module.</li>
                                <li>Instant role and permission assignment.</li>
                                <li>Middleware-ready route protection.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <h5 class="card-header">Recent Accounts</h5>
                <div class="card-body">
                    <div class="list-group list-group-flush mb-3">
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Latest Admins</span>
                                <a href="{{ route('admin.administrators.index') }}" class="small">View all</a>
                            </div>
                        </div>
                        @forelse($recentAdmins as $admin)
                            <div class="list-group-item border-0 px-0 py-2">
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-label-primary me-2"><i class="bx bx-user"></i></span>
                                    <div>
                                        <div class="fw-semibold">{{ $admin->name }}</div>
                                        <small class="text-muted">{{ $admin->email }}</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item border-0 px-0 py-2 text-muted">No admins found</div>
                        @endforelse
                    </div>

                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Latest Users</span>
                                <a href="{{ route('admin.users.index') }}" class="small">View all</a>
                            </div>
                        </div>
                        @forelse($recentUsers as $user)
                            <div class="list-group-item border-0 px-0 py-2">
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-label-success me-2"><i class="bx bx-user-check"></i></span>
                                    <div>
                                        <div class="fw-semibold">{{ $user->name }}</div>
                                        <small class="text-muted">{{ $user->email }}</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item border-0 px-0 py-2 text-muted">No users found</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
