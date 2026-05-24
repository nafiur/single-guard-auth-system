<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aritreek Dashboard')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #0ea5e9;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* Top Navbar */
        .navbar {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border);
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 500;
            font-size: 0.9375rem;
            transition: color 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            background-color: #f1f5f9;
            cursor: pointer;
            transition: background 0.2s;
        }

        .user-profile:hover {
            background-color: #e2e8f0;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Main Content wrapper */
        .main-container {
            max-width: 1280px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .dashboard-header {
            margin-bottom: 2rem;
        }

        .dashboard-title {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .dashboard-subtitle {
            color: var(--text-muted);
        }

        /* Cards and Grid */
        .card {
            background-color: var(--card-bg);
            border-radius: 1rem;
            border: 1px solid var(--border);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        .grid {
            display: grid;
            gap: 1.5rem;
        }

        .grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .grid-2-1 {
            grid-template-columns: 2fr 1fr;
        }

        @media (max-width: 1024px) {

            .grid-3,
            .grid-2-1 {
                grid-template-columns: 1fr;
            }
        }

        /* Utilities */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--primary-light);
            box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.4);
        }

        .badge {
            display: inline-flex;
            padding: 0.25rem 0.625rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Custom Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade {
            animation: fadeIn 0.4s ease-out forwards;
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background-color: var(--danger);
            color: white;
            font-size: 0.625rem;
            min-width: 16px;
            height: 16px;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--card-bg);
            padding: 0 4px;
        }

        .nav-icon-link {
            position: relative;
            color: var(--secondary);
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-icon-link:hover {
            color: var(--primary);
            background-color: #f1f5f9;
        }

        @yield('extra_css')
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="/" class="navbar-brand">
            <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            Aritreek
        </a>

        <div class="nav-links">
            <a href="{{ route('dashboard') }}"
                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="#" class="nav-link">My Orders</a>
            @if (Auth::user()->user_type === 'vendor')
                <a href="#" class="nav-link">Store Front</a>
                <a href="#" class="nav-link">Earnings</a>
            @else
                <a href="#" class="nav-link">Wishlist</a>
                <a href="#" class="nav-link">Deals</a>
            @endif
        </div>

        <div style="display: flex; gap: 0.75rem; align-items: center;">
            <a href="{{ route('user.notifications.index') }}" class="nav-icon-link" title="Notifications">
                <svg style="width: 22px; height: 22px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
                @php $unreadCount = Auth::user()->unreadNotifications->count(); @endphp
                @if ($unreadCount > 0)
                    <span class="notification-badge">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
                @endif
            </a>

            <div class="user-profile">
                <div class="avatar" style="overflow: hidden; padding: 0;">
                    @if (Auth::user()->profile_image)
                        <img src="{{ url('upload/users/' . Auth::user()->profile_image) }}" alt="Profile Photo"
                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 9999px;">
                    @else
                        {{ substr(Auth::user()->name, 0, 1) }}
                    @endif
                </div>
                <span style="font-size: 0.875rem; font-weight: 600;">{{ Auth::user()->name }}</span>
            </div>

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn" style="color: var(--danger); padding: 0.5rem;">
                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </nav>

    <div class="main-container">
        @yield('content')
    </div>

    @yield('extra_js')
    @flasher_render
</body>

</html>
