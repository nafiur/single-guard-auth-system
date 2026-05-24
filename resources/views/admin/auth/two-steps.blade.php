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
    <title>Two Step Verification | {{ $siteTitle }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
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
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/theme-semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-auth.css') }}" />
    <style>
        .otp-page {
            min-height: 100vh;
            background: #edf0f8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            position: relative;
            overflow: hidden;
        }

        .otp-page::after {
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

        .otp-wrap {
            width: min(1200px, 100%);
            position: relative;
            z-index: 1;
        }

        .otp-panel {
            background: #fff;
            border-radius: 0.85rem;
            box-shadow: 0 16px 42px rgba(32, 45, 86, 0.18);
            padding: 2.5rem;
        }

        .otp-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .otp-visual {
            min-height: 360px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: 1px solid #eceff6;
            padding-right: 2rem;
        }

        .otp-visual img {
            width: min(320px, 90%);
            height: auto;
        }

        .otp-form {
            padding-left: 1rem;
        }

        .otp-title {
            color: #3f4358;
            font-size: 1.9rem;
            font-weight: 600;
            margin-bottom: 0.35rem;
        }

        .otp-subtitle {
            color: #8a8da3;
            margin-bottom: 1rem;
        }

        .otp-target {
            color: #5f4eff;
            font-weight: 600;
        }

        .otp-label {
            color: #6f7086;
            font-weight: 600;
            margin-bottom: 0.6rem;
            font-size: 0.82rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            display: block;
        }

        .otp-inputs .auth-input {
            height: 3.2rem;
            border-radius: 0.7rem;
            border: 1px solid #e1e3ec;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .otp-inputs .auth-input:focus {
            border-color: #6b4ff0;
            box-shadow: 0 0 0 0.2rem rgba(107, 79, 240, 0.15);
        }

        .otp-btn {
            width: 100%;
            border: 0;
            border-radius: 999px;
            height: 3.35rem;
            font-size: 1.02rem;
            letter-spacing: 0.2em;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(90deg, #7c54f4 0%, #6b4ff0 100%);
            margin-top: 0.75rem;
        }

        .otp-resend {
            text-align: center;
            margin-top: 1rem;
            color: #8f90a5;
        }

        .otp-resend .btn-link {
            color: #6b4ff0;
            font-weight: 600;
            text-decoration: none;
        }

        @media (max-width: 991.98px) {
            .otp-panel {
                padding: 1.5rem;
            }

            .otp-grid {
                grid-template-columns: 1fr;
            }

            .otp-visual {
                min-height: auto;
                border-right: 0;
                border-bottom: 1px solid #eceff6;
                padding-right: 0;
                padding-bottom: 1.25rem;
            }

            .otp-form {
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
    <div class="otp-page">
        <div class="otp-wrap">
            <div class="otp-panel">
                <div class="otp-grid">
                    <div class="otp-visual">
                        <img src="{{ asset('backend/assets/img/password.png') }}" alt="OTP Verification Illustration">
                    </div>

                    <div class="otp-form">
                        <h4 class="otp-title">Two Step Verification</h4>
                        <p class="otp-subtitle">
                            We sent a verification code to your email/mobile.
                            <span class="otp-target d-block mt-1">{{ session('otp_identifier') }}</span>
                        </p>

                        <label class="otp-label">Type your {{ $length ?? 6 }} digit security code</label>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="twoStepsForm" action="{{ route($verifyRoute) }}" method="POST">
                            @csrf
                            <div class="mb-3 otp-inputs">
                                <div class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
                                    <input type="tel" class="form-control auth-input text-center numeral-mask mx-1 my-2" maxlength="1" autofocus />
                                    <input type="tel" class="form-control auth-input text-center numeral-mask mx-1 my-2" maxlength="1" />
                                    <input type="tel" class="form-control auth-input text-center numeral-mask mx-1 my-2" maxlength="1" />
                                    <input type="tel" class="form-control auth-input text-center numeral-mask mx-1 my-2" maxlength="1" />
                                    <input type="tel" class="form-control auth-input text-center numeral-mask mx-1 my-2" maxlength="1" />
                                    <input type="tel" class="form-control auth-input text-center numeral-mask mx-1 my-2" maxlength="1" />
                                </div>
                                <input type="hidden" name="otp" id="otp" />
                            </div>
                            <button class="otp-btn" type="submit">VERIFY ACCOUNT</button>
                        </form>

                        <div class="otp-resend">
                            Didn't get the code?
                            <form action="{{ route($resendRoute) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Resend</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.numeral-mask');
            const hiddenInput = document.getElementById('otp');

            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    if (e.target.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                    combineOtp();
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });

            function combineOtp() {
                let otp = '';
                inputs.forEach(input => {
                    otp += input.value;
                });
                hiddenInput.value = otp;
            }
        });
    </script>
</body>

</html>
