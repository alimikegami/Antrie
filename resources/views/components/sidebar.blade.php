@auth
    {{-- side Nav mobile --}}
    <div class="sidebar sidebar-start d-flex d-lg-none" id="navbar-responsive">
        <div class="sidebar-header d-flex flex-row">
            <div class="sidebar-logo">
                <a href="/" class="d-flex align-items-center text-decoration-none justify-content-center">
                    <img src={{ asset('img/logoAntriedark.png') }} alt="logo-antrie">
                </a>
            </div>
            <i class="bi bi-list text-center sidebar-hamburger" id="sidebar_btn"></i>
        </div>
        <ul class="nav-list">
            <li class="menu">
                <a href="{{ route('beranda') }}">
                    <i class="bi bi-house"></i>
                    <span href="" class="links-name">Beranda</span>
                </a>
                <span class="links-tooltip">Beranda</span>
            </li>
            <li class="menu">
                <a href="{{ route('antreanku') }}">
                    <i class="bi bi-archive"></i>
                    <span href="" class="links-name">Antreanku</span>
                </a>
                <span class="links-tooltip">Antreanku</span>
            </li>
            <li class="menu">
                <a href="{{ route('riwayat-antrean') }}">
                    <i class="bi bi-chat-left-text"></i>
                    <span href="" class="links-name">Riwayat</span>
                </a>
                <span class="links-tooltip">Riwayat</span>
            </li>
        </ul>
        <div class="sidebar-profile">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-3">
                <span class="d-sm-inline mx-1">{{ Auth::user()->nama }}</span>
                <i class="bi bi-gear"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li class="divider">
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar sidebar-start active static d-none d-lg-flex" id="navbar-responsive">
        <div class="sidebar-header d-flex flex-row justify-content-center">
            <div class="static-sidebar-logo">
                <a href="/" class="d-flex align-items-center text-decoration-none justify-content-center">
                    <img src={{ asset('img/logoAntriedark.png') }} alt="logo-antrie">
                </a>
            </div>
        </div>
        <ul class="nav-list">
            <li class="menu">
                <a href="{{ route('beranda') }}">
                    <i class="bi bi-house"></i>
                    <span href="" class="links-name">Beranda</span>
                </a>
                <span class="links-tooltip">Beranda</span>
            </li>
            <li class="menu">
                <a href="{{ route('antreanku') }}">
                    <i class="bi bi-archive"></i>
                    <span href="" class="links-name">Antreanku</span>
                </a>
                <span class="links-tooltip">Antreanku</span>
            </li>
            <li class="menu">
                <a href="{{ route('riwayat-antrean') }}">
                    <i class="bi bi-chat-left-text"></i>
                    <span href="" class="links-name">Riwayat</span>
                </a>
                <span class="links-tooltip">Riwayat</span>
            </li>
        </ul>
        <div class="sidebar-profile">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-3">
                <span class="d-sm-inline mx-1">{{ Auth::user()->nama }}</span>
                <i class="bi bi-gear"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li class="divider">
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
            </ul>
        </div>
    </div>

    {{-- humburger menu --}}
    <div class="col-1 d-md-none d-flex flex-column align-items-start position-fixed bg-white w-100 p-0" id="side-nav">
        <i class="bi bi-list text-center" id="sidenav_btn" style="width: 55px; font-size: 2rem; color: #2F2D65;"></i>
    </div>
@else
    <div
        class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 bg-white d-flex justify-content-center coba d-md-none d-lg-flex d-none">
        <div class="d-flex flex-column align-items-center px-3 pt-5 min-vh-100 navbar-dashboard justify-content-start">
            <a href="/" class="d-flex align-items-center pb-3 text-decoration-none">
                <img class="img-fluid" src="{{ asset('img/logoAntriedark.png') }}" alt="logo-antrie">
            </a>
            <hr>
            <div class="d-flex justify-content-center align-items-center sideNav-login-btn">
                <a href="#" class="menu-not-login d-flex justify-content-center align-items-center">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </div>
        </div>
    </div>
@endauth
