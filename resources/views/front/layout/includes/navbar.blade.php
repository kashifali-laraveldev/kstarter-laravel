<!-- ═══════════════════════ NAVBAR ═══════════════════════ -->
<nav class="kstarter-navbar">
    <div class="navbar-inner">
        <!-- Logo -->
        <a href="{{ route('front.home') }}" class="kstarter-logo">
            <div class="logo-icon">
                <img src="{{ asset('common_assets') }}/images/logo.png" class="web-logo-img" alt="KStarter Laravel">
            </div>
        </a>

        <!-- Nav Links -->
        <ul class="kstarter-nav-links">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Docs</a></li>
            <li><a href="#">Changelog</a></li>
            <li><a href="#">Support</a></li>
        </ul>

        <!-- Action Buttons -->
        <div class="navbar-actions">
            @if(Auth::guard('admin')->check())
                <form method="POST" action="{{ route('admin.logout') }}" style="display:contents;">
                    @csrf
                    <button type="submit" class="btn-github">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
                <a href="{{ route('admin.dashboard') }}" class="btn-download-nav">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            @else
                <a href="{{ route('admin.login.view') }}" class="btn-github">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </a>
            @endif
        </div>
    </div>
</nav>
