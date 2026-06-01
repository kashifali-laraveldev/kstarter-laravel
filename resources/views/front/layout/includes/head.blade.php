<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KStarter Laravel - Kickstart Your Laravel Projects</title>
    <meta name="description" content="A modern, production-ready Laravel 11 starter kit with custom authentication, role-based access control, user management, and a clean architecture. Build scalable web apps faster." />
    <meta name="keywords" content="Laravel starter kit, Laravel 11, Bootstrap 5, RBAC, admin panel, PHP starter, open source" />
    <link rel="canonical" href="{{ url('/') }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('front_assets/images/favicon/favicon.svg') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('front_assets/images/favicon/favicon.ico') }}" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:title" content="KStarter Laravel - Kickstart Your Laravel Projects" />
    <meta property="og:description" content="A modern, production-ready Laravel 11 starter kit with custom authentication, RBAC, user management, and a clean architecture." />
    <meta property="og:image" content="{{ asset('front_assets/images/favicon/favicon.svg') }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="KStarter Laravel - Kickstart Your Laravel Projects" />
    <meta name="twitter:description" content="A modern, production-ready Laravel 11 starter kit with custom authentication, RBAC, user management, and a clean architecture." />
    <meta name="twitter:image" content="{{ asset('front_assets/images/favicon/favicon.svg') }}" />

    <!-- JSON-LD Structured Data -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "name": "KStarter Laravel",
        "description": "A modern, production-ready Laravel 11 starter kit with custom authentication, role-based access control, user management, and a clean Controller-Service-Library architecture.",
        "applicationCategory": "DeveloperApplication",
        "operatingSystem": "Linux, Windows, macOS",
        "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
        "author": {
            "@type": "Person",
            "name": "Kashif Ali",
            "url": "https://kashifali.kitsoftsol.com"
        }
    }
    </script>
    @endverbatim

    <!-- Bootstrap 5 (Local) -->
    <link href="{{ asset('front_assets') }}/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

    <!-- Styling -->
    <link href="{{ asset('front_assets') }}/css/style.css" rel="stylesheet" />
    <link href="{{ asset('front_assets') }}/css/ks_custom.css" rel="stylesheet" />

    @yield('css')
</head>
