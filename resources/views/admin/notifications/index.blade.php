@extends('admin.layouts.app')

@section('header_title', 'All Notifications')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Notifications</h5>
            @if (Auth::user()->unreadNotifications->isNotEmpty())
                <a href="{{ route('markAsRead') }}" class="btn btn-primary btn-sm">Mark all as read</a>
            @endif
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Notification</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($notifications as $notification)
                        <tr class="{{ $notification->read_at ? 'text-muted' : 'fw-bold' }}">
                            <td>
                                <div>{{ $notification->data['title'] ?? 'Notification' }}</div>
                                <small>{{ $notification->data['message'] ?? '' }}</small>
                            </td>
                            <td>{{ class_basename($notification->type) }}</td>
                            <td>{{ $notification->created_at->diffForHumans() }}</td>
                            <td>
                                @if ($notification->read_at)
                                    <span class="badge bg-label-secondary">Read</span>
                                @else
                                    <span class="badge bg-label-primary">New</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No notifications found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $notifications->links() }}
        </div>
    </div>
@endsection
