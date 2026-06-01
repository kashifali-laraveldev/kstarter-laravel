@php
    $navUser    = Auth::guard('admin')->user()->load('profile');
    $navProfile = $navUser->profile;
    $navName    = $navProfile
        ? trim(($navProfile->first_name ?? '') . ' ' . ($navProfile->last_name ?? ''))
        : $navUser->user_name;
    $navInitial = strtoupper(substr($navProfile->first_name ?? $navUser->user_name, 0, 1));
@endphp

<!-- Navbar -->
<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
>
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="ks-navbar-tagline d-none d-md-flex align-items-center gap-2">
                <span class="ks-navbar-badge">
                    <i class="bx bx-rocket"></i> KStarter Laravel
                </span>
                <span class="ks-navbar-text">
                    Skip the boilerplate. <span class="ks-navbar-highlight">Auth, roles & permissions</span> - already built, just ship your product.
                </span>
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if($navProfile && $navProfile->profile_picture)
                            <img src="{{ asset('storage/' . $navProfile->profile_picture) }}"
                                 alt="{{ $navName }}" class="w-px-40 h-auto rounded-circle"
                                 style="object-fit:cover;">
                        @else
                            <span style="display:flex;width:100%;height:100%;background:#696cff;color:#fff;border-radius:50%;align-items:center;justify-content:center;font-weight:700;font-size:16px;">{{ $navInitial }}</span>
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if($navProfile && $navProfile->profile_picture)
                                            <img src="{{ asset('storage/' . $navProfile->profile_picture) }}"
                                                 alt="{{ $navName }}" class="w-px-40 h-auto rounded-circle"
                                                 style="object-fit:cover;">
                                        @else
                                            <span style="display:flex;width:100%;height:100%;background:#696cff;color:#fff;border-radius:50%;align-items:center;justify-content:center;font-weight:700;font-size:16px;">{{ $navInitial }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ $navName ?: $navUser->user_name }}</span>
                                    <small class="text-muted">{{ $navUser->user_name }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li><div class="dropdown-divider"></div></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li><div class="dropdown-divider"></div></li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<!-- / Navbar -->
