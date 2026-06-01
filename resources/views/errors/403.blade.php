<!DOCTYPE html>
<html lang="en" class="light-style" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin_assets') }}/"
    data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>403 - Access Denied | KStarter Laravel</title>

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

    <style>
        html, body { height: 100%; }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #f5f5f9;
            font-family: 'Public Sans', sans-serif;
        }
        .ks-error-wrapper {
            text-align: center;
            padding: 2rem 1.5rem;
            max-width: 480px;
            width: 100%;
        }
        .ks-error-icon-ring {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: rgba(105, 108, 255, 0.1);
            margin-bottom: 1.75rem;
        }
        .ks-error-icon-ring i {
            font-size: 3.25rem;
            color: #696cff;
        }
        .ks-error-code {
            font-size: 6rem;
            font-weight: 800;
            line-height: 1;
            color: #696cff;
            letter-spacing: -4px;
            margin-bottom: 0.5rem;
        }
        .ks-error-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #566a7f;
            margin-bottom: 0.75rem;
        }
        .ks-error-desc {
            font-size: 0.9375rem;
            color: #a5acb8;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        .ks-error-divider {
            width: 48px;
            height: 3px;
            border-radius: 4px;
            background: linear-gradient(90deg, #696cff, #9c9eff);
            margin: 0 auto 1.75rem;
        }
        .ks-error-actions {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

<div class="ks-error-wrapper">

    <div class="ks-error-icon-ring">
        <i class="bx bx-lock-alt"></i>
    </div>

    <div class="ks-error-code">403</div>

    <div class="ks-error-divider"></div>

    <h4 class="ks-error-title">Access Denied</h4>
    <p class="ks-error-desc">
        You don't have permission to view this page.<br>
        Contact your administrator if you believe this is a mistake.
    </p>

    <div class="ks-error-actions">
        <a href="javascript:history.back()" class="btn btn-outline-secondary">
            <i class="bx bx-arrow-back me-1"></i> Go Back
        </a>
        <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">
            <i class="bx bx-home me-1"></i> Dashboard
        </a>
    </div>

</div>

<script src="{{ asset('admin_assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('admin_assets') }}/vendor/js/bootstrap.js"></script>

</body>
</html>
