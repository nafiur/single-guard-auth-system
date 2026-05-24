<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('backend/assets/') }}" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | {{ config('app.name') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    @php
        $rawFavicon = trim((string) \App\Models\Setting::value('site_logo', ''));
        $favicon = $rawFavicon ?: asset('backend/assets/img/favicon/favicon.ico');
        if (!$rawFavicon) {
            $favicon = asset('backend/assets/img/password.png');
        } elseif (
            !str_starts_with($rawFavicon, 'http://') &&
            !str_starts_with($rawFavicon, 'https://') &&
            !str_starts_with($rawFavicon, '/')
        ) {
            $favicon = asset($rawFavicon);
        }
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-auth.css') }}" />
    <style>
        .admin-login-page {
            min-height: 100vh;
            background: #edf0f8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            position: relative;
            overflow: hidden;
        }

        .admin-login-page::after {
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

        .admin-login-wrap {
            width: min(1200px, 100%);
            position: relative;
            z-index: 1;
        }

        .admin-login-panel {
            background: #fff;
            border-radius: 0.85rem;
            box-shadow: 0 16px 42px rgba(32, 45, 86, 0.18);
            padding: 2.5rem;
        }

        .admin-login-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .admin-login-visual {
            min-height: 360px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            border-right: 1px solid #eceff6;
            padding-right: 2rem;
        }

        .admin-login-visual img {
            width: min(320px, 90%);
            height: auto;
        }

        .admin-login-form {
            padding-left: 1rem;
        }

        .admin-login-title {
            color: #3f4358;
            font-size: 1.9rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .admin-login-subtitle {
            color: #8a8da3;
            margin-bottom: 1.5rem;
        }

        .admin-form-label {
            color: #6f7086;
            font-weight: 600;
            margin-bottom: 0.55rem;
            font-size: 0.82rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .admin-input-wrap {
            position: relative;
            margin-bottom: 1rem;
        }

        .admin-input-wrap .form-control {
            height: 3.1rem;
            border-radius: 999px;
            border: 1px solid #e1e3ec;
            padding-left: 1rem;
            padding-right: 2.9rem;
            font-size: 1rem;
        }

        .admin-input-wrap .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #787da0;
            font-size: 1.3rem;
        }

        .admin-login-btn {
            width: 100%;
            border: 0;
            border-radius: 999px;
            height: 3.35rem;
            font-size: 1.02rem;
            letter-spacing: 0.35em;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(90deg, #7c54f4 0%, #6b4ff0 100%);
            margin-top: 0.75rem;
        }

        .admin-login-links {
            text-align: center;
            margin-top: 1rem;
            color: #8f90a5;
        }

        .admin-login-links a {
            color: #6b4ff0;
            font-weight: 600;
        }

        .admin-login-footer {
            text-align: center;
            margin-top: 2rem;
            color: #8f90a5;
        }

        @media (max-width: 991.98px) {
            .admin-login-panel {
                padding: 1.5rem;
            }

            .admin-login-grid {
                grid-template-columns: 1fr;
            }

            .admin-login-visual {
                min-height: auto;
                border-right: 0;
                border-bottom: 1px solid #eceff6;
                padding-right: 0;
                padding-bottom: 1.25rem;
            }

            .admin-login-form {
                padding-left: 0;
                padding-top: 0.75rem;
            }
        }
    </style>

    <!-- Helpers -->
    <script src="{{ asset('backend/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="admin-login-page">
        <div class="admin-login-wrap">
            <div class="admin-login-panel">
                <div class="admin-login-grid">
                    <div class="admin-login-visual">
                        <img src="{{ asset('backend/assets/img/password.png') }}" alt="Login Illustration">
                    </div>

                    <div class="admin-login-form">
                        <h4 class="admin-login-title">Welcome Back!</h4>
                        <p class="admin-login-subtitle">Please sign-in to your account.</p>

                        @if (!($loginEnabled ?? true))
                            <div class="alert alert-warning">
                                User login is currently disabled. Please contact support.
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($loginEnabled ?? true)
                            <form id="formAuthentication" action="{{ route('login') }}" method="POST">
                                @csrf
                                <label class="admin-form-label" for="email">Email Address</label>
                                <div class="admin-input-wrap">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" value="{{ old('email') }}" required autofocus />
                                    <i class="bx bx-user input-icon"></i>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="admin-form-label mb-0" for="password">Password</label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
                                    @endif
                                </div>

                                <div class="admin-input-wrap mt-2">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Enter your password" required />
                                    <i class="bx bx-lock-alt input-icon"></i>
                                </div>

                                <div class="mb-3 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                </div>

                                <button class="admin-login-btn" type="submit">LOGIN</button>
                            </form>
                        @endif

                        <div class="admin-login-links">
                            @if (\App\Models\Setting::boolean('user_registration_enabled', true))
                                <p class="mb-1">New on our platform?</p>
                                <a href="{{ route('register') }}">Create an account</a>
                            @else
                                <p class="mb-0">Registration is currently disabled.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="admin-login-footer">
                    <small>Terms of use. Privacy policy</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    <!-- Page JS -->
</body>

</html>
