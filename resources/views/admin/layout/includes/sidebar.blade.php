<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('admin/dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span style="background:linear-gradient(135deg,#6366f1,#4f46e5);color:#fff;font-weight:700;font-size:18px;width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;">K</span>
            </span>
            <span class="app-brand-text demo menu-text ms-2"><strong style="font-size:1.1em;">KS</strong><span style="font-size:0.75em;font-weight:400;">tarter</span></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">ACL</span>
        </li>

        @php
            $usersActive = request()->is('admin/users') || request()->is('admin/users/*');
            $rolesActive = request()->is('admin/roles') || request()->is('admin/roles/*');
            $permissionsActive = request()->is('admin/permissions') || request()->is('admin/permissions/*');
            $permCatActive = request()->is('admin/permission-categories') || request()->is('admin/permission-categories/*');
        @endphp

        <!-- Users -->
        <li class="menu-item {{ $usersActive ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/users') ? 'active' : '' }}">
                    <a href="{{ url('admin/users') }}" class="menu-link">
                        <div data-i18n="All Users">All Users</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/users/create') ? 'active' : '' }}">
                    <a href="{{ url('admin/users/create') }}" class="menu-link">
                        <div data-i18n="Add New User">Add New User</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Roles -->
        <li class="menu-item {{ $rolesActive ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-shield"></i>
                <div data-i18n="Roles">Roles</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/roles') ? 'active' : '' }}">
                    <a href="{{ url('admin/roles') }}" class="menu-link">
                        <div data-i18n="All Roles">All Roles</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/roles/create') ? 'active' : '' }}">
                    <a href="{{ url('admin/roles/create') }}" class="menu-link">
                        <div data-i18n="Add New Role">Add New Role</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Permissions -->
        <li class="menu-item {{ $permissionsActive ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Permissions">Permissions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/permissions') ? 'active' : '' }}">
                    <a href="{{ url('admin/permissions') }}" class="menu-link">
                        <div data-i18n="All Permissions">All Permissions</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/permissions/create') ? 'active' : '' }}">
                    <a href="{{ url('admin/permissions/create') }}" class="menu-link">
                        <div data-i18n="Add New Permission">Add New Permission</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Permission Categories -->
        <li class="menu-item {{ $permCatActive ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Permission Categories">Permission Categories</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/permission-categories') ? 'active' : '' }}">
                    <a href="{{ url('admin/permission-categories') }}" class="menu-link">
                        <div data-i18n="All Categories">All Categories</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/permission-categories/create') ? 'active' : '' }}">
                    <a href="{{ url('admin/permission-categories/create') }}" class="menu-link">
                        <div data-i18n="Add New Category">Add New Category</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>

        <li class="menu-item {{ request()->is('admin/profile') ? 'active' : '' }}">
            <a href="{{ url('admin/profile') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Profile">Profile</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
