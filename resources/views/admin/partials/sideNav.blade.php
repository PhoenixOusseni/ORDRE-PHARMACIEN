<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Pages</div>
                    <a class="nav-link collapsed" href="{{ route('admin') }}">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Tableau de bord
                    </a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError1" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                        MEMBRES
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError1" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('membre_actif') }}">Membre actifs</a>
                            {{-- @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire' || Auth::user()->role == 'Caisse') --}}
                            <a class="nav-link" href="{{ route('membre_inactif') }}">Membre en attents</a>
                            {{-- @endif --}}
                        </nav>
                    </div>
                    @if (Auth::user()->Role->id == 3 || Auth::user()->Role->id == 4)
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError2" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            <div class="nav-link-icon"><i data-feather="package"></i></div>
                            COTISATION
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError2" data-bs-parent="#accordionSidenavPagesMenu">
                            <nav class="sidenav-menu-nested nav">
                                {{-- @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire' || Auth::user()->role == 'Administration' || Auth::user()->role == 'Caisse') --}}
                                <a class="nav-link" href="{{ route('gestion_cotisations.index') }}">Liste cotisation</a>
                                {{-- @endif --}}
                                <a class="nav-link" href="{{ route('gestion_cotisations.create') }}">Ajouter
                                    cotisation</a>
                            </nav>
                        </div>
                    @endif

                    @if (Auth::user()->Role->id == 3)
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages345" aria-expanded="false" aria-controls="collapsePages">
                            <div class="nav-link-icon"><i data-feather="users"></i></div>
                            Administration
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages345" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <a class="nav-link collapsed" href="{{ route('gestion_compte') }}">
                                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                                    Gestion des comptes
                                </a>
                                <a class="nav-link collapsed" href="{{ route('gestion_compte') }}">
                                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                                    Ajouter membre
                                </a>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
            <img class="text-center" src="{{ asset('assets/img/22_a9ad743c.jpg') }}" alt="logo" width="100%"
                style="margin: auto">
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Utilisateur connecté(e):</div>
                    <div class="sidenav-footer-title">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</div>
                    <h6 class="text-center text-primary">Role : {{ Auth::user()->Role->libelle }}</h6>
                </div>
            </div>
        </nav>
    </div>
