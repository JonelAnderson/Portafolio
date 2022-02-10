
<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <!-- Sidenav Menu Heading (admin)-->
                <div class="sidenav-menu-heading">Administacion</div>
                <!-- Sidenav Link (Home)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/home">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        Perfil
                    </a>
                </li>
                <!-- Sidenav Link (About)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i data-feather="book"></i></div>
                    About
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/about">About</a>
                            <a class="nav-link" href="/admin/education">Educations</a>
                            <a class="nav-link" href="/admin/experience">Experiences</a>
                        </li>
                    </nav>
                </div>


                <!-- Sidenav Link (Services)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/services">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Services
                    </a>
                </li>
                <!-- Sidenav Link (Portafolio)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/portafolio">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Portafolio
                    </a>
                </li>
                <!-- Sidenav Link (Correo)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/correo">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Correo
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Conectado como:</div>
                <div class="sidenav-footer-title">{{Auth::user()->name}}</div>
            </div>
        </div>
    </nav>
</div>
