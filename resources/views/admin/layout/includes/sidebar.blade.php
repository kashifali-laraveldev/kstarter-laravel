@php
    $sidebarCategories = app(\App\Components\HasPermissionsComponent::class)->getDynamicSidebarData();
@endphp

<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('admin/dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('common_assets') }}/images/logo.png" class="web-logo-img" alt="KStarter Laravel">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @foreach($sidebarCategories as $category)

            @if($category->permissions->count() === 1)

                {{-- Single link --}}
                @php
                    $perm     = $category->permissions->first();
                    $icon     = $perm->css_class ?: $category->css_class;
                    $isActive = request()->is($perm->route) || request()->is($perm->route . '/*');
                @endphp

                @if($perm->route === 'admin/logout')
                    {{-- Logout must be a POST --}}
                    <form method="POST" action="{{ route('admin.logout') }}" id="sidebarLogoutForm">@csrf</form>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link" onclick="document.getElementById('sidebarLogoutForm').submit()">
                            <i class="menu-icon tf-icons {{ $icon }}"></i>
                            <div>{{ $perm->permission_name }}</div>
                        </a>
                    </li>
                @else
                    <li class="menu-item {{ $isActive ? 'active' : '' }}">
                        <a href="{{ url($perm->route) }}" class="menu-link">
                            <i class="menu-icon tf-icons {{ $icon }}"></i>
                            <div>{{ $perm->permission_name }}</div>
                        </a>
                    </li>
                @endif

            @else

                {{-- Dropdown --}}
                @php
                    $isOpen     = $category->permissions->contains(fn($p) => request()->is($p->route) || request()->is($p->route . '/*'));
                    $toggleIcon = $category->css_class ?: optional($category->permissions->first())->css_class;
                @endphp
                <li class="menu-item has-sub {{ $isOpen ? 'open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons {{ $toggleIcon }}"></i>
                        <div>{{ $category->category_name }}</div>
                    </a>
                    <ul class="menu-sub">
                        @foreach($category->permissions as $perm)
                            @php
                                $isActiveChild = request()->is($perm->route) || request()->is($perm->route . '/*');
                            @endphp
                            <li class="menu-item {{ $isActiveChild ? 'active' : '' }}">
                                <a href="{{ url($perm->route) }}" class="menu-link">
                                    @if($perm->css_class)
                                        <i class="menu-icon tf-icons {{ $perm->css_class }}"></i>
                                    @else
                                        <i class="menu-bullet tf-icons bx bxs-circle" style="font-size:0.375rem;"></i>
                                    @endif
                                    <div>{{ $perm->permission_name }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            @endif

        @endforeach

    </ul>
</aside>
<!-- / Menu -->
