@extends('user.layouts.app')

@section('title', 'My Notifications | Aritreek')

@section('content')
    <div class="dashboard-header animate-fade">
        <h1 class="dashboard-title">Notifications 🔔</h1>
        <p class="dashboard-subtitle">Stay updated with your account activity.</p>
    </div>

    <div class="card animate-fade" style="padding: 0; overflow: hidden;">
        <div
            style="padding: 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-size: 1.125rem; font-weight: 700; margin: 0;">Recent Notifications</h3>
            @if (Auth::user()->unreadNotifications->isNotEmpty())
                <a href="{{ route('user.markAsRead') }}" class="btn btn-primary btn-sm"
                    style="font-size: 0.8125rem; padding: 0.5rem 1rem;">
                    Mark all as read
                </a>
            @endif
        </div>

        <div style="display: flex; flex-direction: column;">
            @forelse ($notifications as $notification)
                <div
                    style="padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border); display: flex; gap: 1rem; {{ $notification->read_at ? 'opacity: 0.7;' : 'background-color: #f8fafc;' }}">
                    <div
                        style="background-color: {{ $notification->read_at ? '#f1f5f9' : '#e0e7ff' }}; color: {{ $notification->read_at ? '#64748b' : '#4338ca' }}; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="{{ $notification->data['icon'] ?? 'bx bx-bell' }}" style="font-size: 1.25rem;"></i>
                    </div>
                    <div style="flex: 1;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.25rem;">
                            <h4 style="font-size: 0.9375rem; font-weight: 600; margin: 0; color: var(--text-main);">
                                {{ $notification->data['title'] ?? 'Notification' }}
                            </h4>
                            <span style="font-size: 0.75rem; color: var(--text-muted);">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <p style="font-size: 0.875rem; color: var(--text-secondary); margin: 0;">
                            {{ $notification->data['message'] ?? '' }}
                        </p>
                    </div>
                </div>
            @empty
                <div style="padding: 4rem 2rem; text-align: center;">
                    <div
                        style="background-color: #f8fafc; width: 64px; height: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                        <i class="bx bx-bell-off" style="font-size: 2rem; color: #cbd5e1;"></i>
                    </div>
                    <p style="color: var(--text-muted); font-size: 0.9375rem;">You don't have any notifications yet.</p>
                </div>
            @endforelse
        </div>

        @if ($notifications->hasPages())
            <div style="padding: 1.5rem; border-top: 1px solid var(--border);">
                {{ $notifications->links() }}
            </div>
        @endif
    </div>
@endsection
