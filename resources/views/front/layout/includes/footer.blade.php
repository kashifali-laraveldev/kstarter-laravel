<!-- ═══════════════════════ FOOTER ═══════════════════════ -->
<footer class="kstarter-footer">
    <div class="footer-inner">
        <div class="footer-row">

            <!-- Brand -->
            <div class="footer-col footer-brand-col">
                <a href="{{ route('front.home') }}" class="footer-logo">
                    <div class="logo-icon">K</div>
                    <span class="logo-text"><span>KStarter</span> Laravel</span>
                </a>
                <p class="footer-tagline">
                    A production-ready Laravel 11 starter kit for developers who value clean architecture,
                    custom RBAC, and a polished admin experience — free forever.
                </p>
                <p class="footer-copy">&copy; {{ date('Y') }} KStarter Laravel. All rights reserved.</p>
            </div>

            <!-- Navigation -->
            <div class="footer-col">
                <h6 class="footer-col-title">Navigation</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#support">Support</a></li>
                    <li><a href="{{ route('admin.login.view') }}">Admin Login</a></li>
                </ul>
            </div>

            <!-- Creator -->
            <div class="footer-col">
                <h6 class="footer-col-title">Creator</h6>
                <p class="footer-creator-name">Kashif Ali</p>
                <ul class="footer-links">
                    <li>
                        <a href="https://kashifali.kitsoftsol.com" target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-globe2"></i> Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="mailto:alikashi54321@gmail.com">
                            <i class="bi bi-envelope"></i> alikashi54321@gmail.com
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Support the Project -->
            <div class="footer-col">
                <h6 class="footer-col-title">Support the Project</h6>
                <p class="footer-support-text">
                    If KStarter saved you time, consider a small donation to help keep it free and actively
                    maintained.
                </p>
                <div class="footer-donation">
                    <div class="donation-label">Meezan Bank &mdash; Pakistan</div>
                    <code class="donation-iban">PK31MEZN0002760105244525</code>
                </div>
            </div>

        </div>
    </div>
</footer>
