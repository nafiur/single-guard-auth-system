<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-semi-dark"
    data-assets-path="{{ asset('backend/assets/') }}" data-template="vertical-menu-template-semi-dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    @php
        $siteTitle = \App\Models\Setting::value('site_name', config('app.name'));
    @endphp
    <title>Verify Email | {{ $siteTitle }}</title>

    <meta name="description" content="" />

    @php
        $rawFavicon = trim((string) \App\Models\Setting::value('site_logo', ''));
        $favicon = $rawFavicon ?: asset('backend/assets/img/favicon/favicon.ico');
        if (! $rawFavicon) {
            $favicon = asset('backend/assets/img/favicon/favicon.ico');
        } elseif (!str_starts_with($rawFavicon, 'http://') && !str_starts_with($rawFavicon, 'https://') && !str_starts_with($rawFavicon, '/')) {
            $favicon = asset($rawFavicon);
        }
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/theme-semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-auth.css') }}" />

    <style>
        .admin-verify-page {
            min-height: 100vh;
            background: #edf0f8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            position: relative;
            overflow: hidden;
        }

        .admin-verify-page::after {
            content: "";
            position: absolute;
            left: -10%;
            right: -10%;
            bottom: -140px;
            height: 280px;
            background: linear-gradient(115deg, #7b52ff 0%, #5f4eff 30%, #37d6a3 100%);
            transform: rotate(-7deg);
            z-index: 0;
        }

        .admin-verify-panel {
            width: min(560px, 100%);
            background: #fff;
            border-radius: 0.85rem;
            box-shadow: 0 16px 42px rgba(32, 45, 86, 0.18);
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .admin-verify-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(107, 79, 240, 0.12);
            color: #6b4ff0;
            font-size: 1.75rem;
        }

        .admin-verify-title {
            text-align: center;
            color: #3f4358;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .admin-verify-text {
            text-align: center;
            color: #757a98;
            margin-bottom: 1.25rem;
        }

        .admin-verify-btn {
            width: 100%;
            border: 0;
            border-radius: 999px;
            height: 3rem;
            font-size: 0.95rem;
            letter-spacing: 0.15em;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(90deg, #7c54f4 0%, #6b4ff0 100%);
        }

        .admin-verify-logout {
            border: 1px solid #d9dded;
            border-radius: 999px;
            height: 3rem;
            color: #5d6382;
            background: #fff;
        }
    </style>

    <script src="{{ asset('backend/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="admin-verify-page">
        <div class="admin-verify-panel">
            <div class="admin-verify-icon"><i class="bx bx-envelope"></i></div>
            <h4 class="admin-verify-title">Verify Your Email</h4>
            <p class="admin-verify-text">
                Thanks for signing up. Please verify your email by clicking the link sent to your inbox.
                If you did not receive it, we can send another one.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-center">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <div class="d-grid gap-2">
                <form method="POST" action="{{ route('admin.verification.send') }}">
                    @csrf
                    <button type="submit" class="admin-verify-btn">RESEND VERIFICATION EMAIL</button>
                </form>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-100 admin-verify-logout">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
