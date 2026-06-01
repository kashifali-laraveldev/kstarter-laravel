<!DOCTYPE html>
<html lang="en" class="light-style" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin_assets') }}/"
    data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>KStarter Laravel | Login</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('admin_assets/img/favicon/favicon.svg') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/ks_custom.css?v={{ time() }}" />

    <script src="{{ asset('admin_assets') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('admin_assets') }}/js/config.js"></script>
</head>

<body class="ks-auth-bg">

<div class="ks-auth-wrapper">

    {{-- Left cover panel (desktop only) --}}
    <div class="ks-auth-cover">
        <div class="ks-auth-cover-inner">

            <div class="ks-auth-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('common_assets/images/logo.png') }}" alt="KStarter Laravel">
                </a>
            </div>

            <h2 class="ks-auth-cover-title">
                Everything you need,<br>already built.
            </h2>
            <p class="ks-auth-cover-desc">
                Auth, roles &amp; permissions, user management - all ready out of the box.
                Just ship your product.
            </p>

            <div class="ks-auth-features">
                <div class="ks-auth-feature-item">
                    <span class="ks-auth-feature-icon"><i class="bx bx-check-shield"></i></span>
                    Role-based access control
                </div>
                <div class="ks-auth-feature-item">
                    <span class="ks-auth-feature-icon"><i class="bx bx-user-check"></i></span>
                    User &amp; profile management
                </div>
                <div class="ks-auth-feature-item">
                    <span class="ks-auth-feature-icon"><i class="bx bx-lock-open-alt"></i></span>
                    Granular permissions system
                </div>
                <div class="ks-auth-feature-item">
                    <span class="ks-auth-feature-icon"><i class="bx bx-layout"></i></span>
                    Clean Sneat Bootstrap 5 UI
                </div>
            </div>

        </div>
    </div>

    {{-- Mobile-only branded header (sits above the form card) --}}
    <div class="ks-auth-mobile-header">
        <img src="{{ asset('common_assets/images/logo.png') }}" alt="KStarter Laravel">
        <p>Admin Panel</p>
    </div>

    {{-- Right form panel --}}
    <div class="ks-auth-form-side">
        <div class="ks-auth-card">

            <div class="ks-auth-card-header">
                <h4>Welcome back! 👋</h4>
                <p>Sign in to your admin account to continue.</p>
            </div>

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                {{-- Username --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="loginUsername">Username</label>
                    <div class="ks-auth-input-group">
                        <i class="bx bx-user ks-auth-input-icon"></i>
                        <input type="text"
                            class="form-control"
                            id="loginUsername" name="username"
                            value="{{ old('username', 'admin') }}"
                            placeholder="admin"
                            autofocus autocomplete="username" />
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-1">
                    <div class="mb-1">
                        <label class="form-label fw-semibold mb-0" for="loginPassword">Password</label>
                    </div>
                    <div class="ks-auth-input-group">
                        <i class="bx bx-lock-alt ks-auth-input-icon"></i>
                        <input type="password"
                            class="form-control"
                            id="loginPassword" name="password"
                            value="admin"
                            placeholder="············"
                            autocomplete="current-password" />
                        <button type="button" class="ks-auth-toggle-pw" id="togglePassword">
                            <i class="bx bx-hide" id="togglePwIcon"></i>
                        </button>
                    </div>
                </div>

                {{-- Remember me --}}
                <div class="mb-4 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" />
                        <label class="form-check-label text-muted" for="rememberMe">Keep me signed in</label>
                    </div>
                </div>

                {{-- Sign In --}}
                <button type="submit" class="btn btn-primary btn-ks-login w-100">
                    <i class="bx bx-log-in me-2"></i> Sign In
                </button>

            </form>

        </div>
    </div>

</div>

<script src="{{ asset('admin_assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('admin_assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('admin_assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('admin_assets') }}/js/main.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/Sweetalert2/js/sweetalert.min.js"></script>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var input = document.getElementById('loginPassword');
        var icon  = document.getElementById('togglePwIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bx bx-show';
        } else {
            input.type = 'password';
            icon.className = 'bx bx-hide';
        }
    });

    @if($errors->any())
    window.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: @json($errors->first()),
            confirmButtonColor: '#696cff',
            confirmButtonText: 'Try Again',
        });
    });
    @endif
</script>

</body>
</html>
