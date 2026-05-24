@extends('user.layouts.app')

@section('title', 'Vendor Dashboard | Aritreek')

@section('content')
    <div class="dashboard-header animate-fade">
        <div style="display: flex; justify-content: space-between; align-items: flex-end;">
            <div>
                <h1 class="dashboard-title">Vendor Central: Welcome, {{ explode(' ', $user->name)[0] }}! 📈</h1>
                <p class="dashboard-subtitle">Manage your store, products, and sales performance here.</p>
            </div>
            <a href="#" class="btn btn-primary">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Product
            </a>
        </div>
    </div>

    <div class="grid grid-3 animate-fade" style="animation-delay: 0.1s;">
        <div class="card"
            style="display: flex; gap: 1.25rem; align-items: center; border-left: 4px solid var(--success);">
            <div style="background-color: #dcfce7; color: #15803d; padding: 1rem; border-radius: 1rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <div>
                <div style="font-size: 0.875rem; color: var(--text-muted); font-weight: 500;">Total Sales</div>
                <div style="font-size: 1.5rem; font-weight: 700;">$0.00</div>
            </div>
        </div>

        <div class="card"
            style="display: flex; gap: 1.25rem; align-items: center; border-left: 4px solid var(--primary);">
            <div style="background-color: #e0e7ff; color: #4338ca; padding: 1rem; border-radius: 1rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div>
                <div style="font-size: 0.875rem; color: var(--text-muted); font-weight: 500;">Active Products</div>
                <div style="font-size: 1.5rem; font-weight: 700;">0</div>
            </div>
        </div>

        <div class="card"
            style="display: flex; gap: 1.25rem; align-items: center; border-left: 4px solid var(--warning);">
            <div style="background-color: #fef3c7; color: #b45309; padding: 1rem; border-radius: 1rem;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
            </div>
            <div>
                <div style="font-size: 0.875rem; color: var(--text-muted); font-weight: 500;">Pending Orders</div>
                <div style="font-size: 1.5rem; font-weight: 700;">0</div>
            </div>
        </div>
    </div>

    <div class="grid grid-2-1 animate-fade" style="animation-delay: 0.2s;">
        <div class="card">
            <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1.5rem;">Sales Performance</h3>
            <div
                style="height: 300px; display: flex; align-items: center; justify-content: center; background-color: #f8fafc; border-radius: 0.75rem; color: #94a3b8;">
                <div style="text-align: center;">
                    <svg style="width: 48px; height: 48px; margin-bottom: 1rem;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    <p>Not enough sales data to display chart yet.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1.5rem;">Inventory Status</h3>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.875rem;">
                    <span style="color: var(--text-muted);">In Stock</span>
                    <span style="font-weight: 700;">0</span>
                </div>
                <div style="height: 6px; background-color: #f1f5f9; border-radius: 3px; overflow: hidden;">
                    <div style="width: 0%; height: 100%; background-color: var(--success);"></div>
                </div>

                <div
                    style="display: flex; justify-content: space-between; align-items: center; font-size: 0.875rem; margin-top: 0.5rem;">
                    <span style="color: var(--text-muted);">Low Stock</span>
                    <span style="font-weight: 700;">0</span>
                </div>
                <div style="height: 6px; background-color: #f1f5f9; border-radius: 3px; overflow: hidden;">
                    <div style="width: 0%; height: 100%; background-color: var(--warning);"></div>
                </div>

                <div
                    style="display: flex; justify-content: space-between; align-items: center; font-size: 0.875rem; margin-top: 0.5rem;">
                    <span style="color: var(--text-muted);">Out of Stock</span>
                    <span style="font-weight: 700;">0</span>
                </div>
                <div style="height: 6px; background-color: #f1f5f9; border-radius: 3px; overflow: hidden;">
                    <div style="width: 0%; height: 100%; background-color: var(--danger);"></div>
                </div>
            </div>

            <div style="margin-top: 2rem;">
                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem;">Top Products</h3>
                <p style="color: #94a3b8; font-size: 0.875rem; font-style: italic;">No products found.</p>
            </div>
        </div>
    </div>
@endsection
