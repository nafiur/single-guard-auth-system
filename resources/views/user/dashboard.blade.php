@extends('user.layouts.app')

@section('title', 'My Dashboard | Aritreek')

@section('content')
    <div class="dashboard-header animate-fade">
        <h1 class="dashboard-title">Welcome back, {{ explode(' ', $user->name)[0] }}! 👋</h1>
        <p class="dashboard-subtitle">Here's what's happening with your account today.</p>
    </div>

    <div class="grid grid-3 animate-fade" style="animation-delay: 0.1s;">
        <div class="card" style="display: flex; gap: 1.25rem; align-items: center;">
            <div style="background-color: #e0e7ff; color: #4338ca; padding: 1rem; border-radius: 1rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <div>
                <div style="font-size: 0.875rem; color: var(--text-muted); font-weight: 500;">Total Orders</div>
                <div style="font-size: 1.5rem; font-weight: 700;">{{ $stats['orders_count'] }}</div>
            </div>
        </div>

        <div class="card" style="display: flex; gap: 1.25rem; align-items: center;">
            <div style="background-color: #fef3c7; color: #b45309; padding: 1rem; border-radius: 1rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </div>
            <div>
                <div style="font-size: 0.875rem; color: var(--text-muted); font-weight: 500;">Wishlist</div>
                <div style="font-size: 1.5rem; font-weight: 700;">{{ $stats['wishlist_count'] }}</div>
            </div>
        </div>

        <div class="card" style="display: flex; gap: 1.25rem; align-items: center;">
            <div style="background-color: #dcfce7; color: #15803d; padding: 1rem; border-radius: 1rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <div>
                <div style="font-size: 0.875rem; color: var(--text-muted); font-weight: 500;">Wallet Credits</div>
                <div style="font-size: 1.5rem; font-weight: 700;">$0.00</div>
            </div>
        </div>
    </div>

    <div class="grid grid-2-1 animate-fade" style="animation-delay: 0.2s;">
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.125rem; font-weight: 700;">Recent Orders</h3>
                <a href="#"
                    style="color: var(--primary); font-size: 0.875rem; font-weight: 600; text-decoration: none;">View
                    All</a>
            </div>

            <div style="text-align: center; padding: 3rem 0;">
                <div
                    style="background-color: #f8fafc; width: 64px; height: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <svg style="width: 32px; height: 32px; color: #cbd5e1;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <p style="color: var(--text-muted); font-size: 0.9375rem;">You haven't placed any orders yet.</p>
                <a href="#" class="btn btn-primary" style="margin-top: 1.5rem;">Start Shopping</a>
            </div>
        </div>

        <div class="card">
            <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1.5rem;">Account Actions</h3>

            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                <a href="{{ route('profile.edit') }}" class="btn"
                    style="background-color: #f8fafc; color: var(--text-main); justify-content: flex-start; border: 1px solid var(--border);">
                    <svg style="width: 18px; height: 18px; color: var(--secondary);" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Manage Profile
                </a>
                <a href="#" class="btn"
                    style="background-color: #f8fafc; color: var(--text-main); justify-content: flex-start; border: 1px solid var(--border);">
                    <svg style="width: 18px; height: 18px; color: var(--secondary);" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    My Addresses
                </a>
                <a href="#" class="btn"
                    style="background-color: #f8fafc; color: var(--text-main); justify-content: flex-start; border: 1px solid var(--border);">
                    <svg style="width: 18px; height: 18px; color: var(--secondary);" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                    Payment Methods
                </a>
                <a href="#" class="btn"
                    style="background-color: #f8fafc; color: var(--text-main); justify-content: flex-start; border: 1px solid var(--border);">
                    <svg style="width: 18px; height: 18px; color: var(--secondary);" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    Notifications
                </a>
            </div>
        </div>
    </div>
@endsection
