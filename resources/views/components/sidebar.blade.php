{{-- side Nav mobile --}}
<div class="sidebar sidebar-start d-flex d-lg-none" id="navbar-responsive">
    <div class="sidebar-header d-flex flex-row">
        <div class="sidebar-logo">
            <a href="{{ route('beranda') }}"
                class="d-flex align-items-center text-decoration-none justify-content-center">
                <img src={{ asset('img/logoAntriedark.png') }} alt="logo-antrie">
            </a>
        </div>
        <i class="bi bi-list text-center sidebar-hamburger" id="sidebar_btn"></i>
    </div>
    @auth
        <ul class="nav-list">
            <li class="menu" id="beranda-sidebar">
                <a href="{{ route('beranda') }}" id="beranda-sidebar">
                    <i class="bi bi-house"></i>
                    <span href="" class="links-name">Beranda</span>
                </a>
                <span class="links-tooltip">Beranda</span>
            </li>
            <li class="menu">
                <a href="{{ route('antreanku') }}" id="antreanku-sidebar">
                    <i class="bi bi-archive"></i>
                    <span href="" class="links-name">Antreanku</span>
                </a>
                <span class="links-tooltip">Antreanku</span>
            </li>
            <li class="menu" id="riwayat-sidebar">
                <a href="{{ route('riwayat-antrean') }}" id="riwayat-sidebar">
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
                <li><a class="dropdown-item" href="#">Proyek Baru...</a></li>
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li class="divider">
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
            </ul>
        </div>
    @else
        <ul class="nav-list">
            <li class="menu" id="beranda-sidebar">
                <a href="{{ route('login') }}" id="beranda-sidebar">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span href="" class="links-name">Login</span>
                </a>
                <span class="links-tooltip">Login</span>
            </li>
        </ul>
    @endauth
</div>

<div class="sidebar sidebar-start active static d-none d-lg-flex" id="navbar-responsive">
    <div class="sidebar-header d-flex flex-row justify-content-center">
        <div class="static-sidebar-logo">
            <a href="{{ route('beranda') }}"
                class="d-flex align-items-center text-decoration-none justify-content-center">
                <img src="{{ asset('img/logoAntriedark.png') }}" alt="logo-antrie">
            </a>
        </div>
    </div>
    @auth
        <ul class="nav-list">
            <li class="menu">
                <a href="{{ route('beranda') }}" id="beranda-sidebar-static">
                    <i class="bi bi-house"></i>
                    <span href="" class="links-name">Beranda</span>
                </a>
                <span class="links-tooltip">Beranda</span>
            </li>
            <li class="menu">
                <a href="{{ route('antreanku') }}" id="antreanku-sidebar-static">
                    <i class="bi bi-archive"></i>
                    <span href="" class="links-name">Antreanku</span>
                </a>
                <span class="links-tooltip">Antreanku</span>
            </li>
            <li class="menu">
                <a href="{{ route('riwayat-antrean') }}" id="riwayat-sidebar-static">
                    <i class="bi bi-chat-left-text"></i>
                    <span href="" class="links-name">Riwayat</span>
                </a>
                <span class="links-tooltip">Riwayat</span>
            </li>
        </ul>
        <div class="sidebar-profile">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('img/person-fill.svg') }}" alt="hugenerd" width="30" height="30">
                <span class="d-sm-inline mx-1">{{ Auth::user()->nama }}</span>
                <i class="bi bi-gear"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
            </ul>
        </div>
    @else
        <ul class="nav-list">
            <li class="menu">
                <a href="{{ route('login') }}" id="beranda-sidebar-static">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span href="" class="links-name">Login</span>
                </a>
                <span class="links-tooltip">Login</span>
            </li>
        </ul>
    @endauth
</div>

{{-- humburger menu --}}
<div class="col-1 d-md-none d-flex flex-column align-items-start position-fixed bg-white w-100 p-0" id="side-nav">
    <i class="bi bi-list text-center" id="sidenav_btn" style="width: 55px; font-size: 2rem; color: #2F2D65;"></i>
</div>
