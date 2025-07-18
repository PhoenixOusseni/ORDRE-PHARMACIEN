<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">pharmacienbf@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+226 25 36 00 25</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('dashboard') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/img/logo_banner.png') }}" alt="Logo">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    @if (Auth::user()->Role->id == 2 || Auth::user()->Role->id == 3 || Auth::user()->Role->id == 4)
                        <li><a href="{{ route('admin') }}" class="active">Administration<br></a></li>
                        <li><a href="{{ route('gestion_cotisations.index') }}">Cotisation</a></li>
                    @endif

                    @if (Auth::user()->statut == 'En cours')
                        <li><a href="{{ route('errors_404') }}">Mes cotisations</a></li>
                    @endif

                    @if (Auth::user()->statut == 'Actif')
                        <li><a href="{{ route('mes_cotisations') }}">Mes cotisations</a></li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="cta-btn d-none d-sm-block" href="{{ route('compte') }}">Mon profile</a>
            <form method="POST" action="{{ route('logout') }}" style="border: none;">
                @csrf
                <button class="cta-btn d-none d-sm-block" type="submit">
                    {{ __('Se déconnecter') }}
                </button>
            </form>
        </div>
    </div>
</header>
