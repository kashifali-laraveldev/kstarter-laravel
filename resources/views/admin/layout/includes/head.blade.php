<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Admin | KStarter Laravel')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('admin_assets/img/favicon/favicon.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendor/libs/apex-charts/apex-charts.css" />

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/DataTable/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/DataTable/css/buttons.bootstrap5.min.css">

    {{-- Select2 CSS --}}
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/Select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/Select2/css/select2-bootstrap-5-theme.min.css">

    {{-- KStarter CSS --}}
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/ks_custom.css?v={{ time() }}" />
    @yield('css')

    <!-- Helpers -->
    <script src="{{ asset('admin_assets') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('admin_assets') }}/js/config.js"></script>
</head>
