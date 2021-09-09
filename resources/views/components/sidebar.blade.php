@auth
    <div
        class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 bg-white d-flex justify-content-center coba d-md-none d-lg-flex d-none">
        <div class="d-flex flex-column align-items-center px-3 pt-5 min-vh-100 navbar-dashboard">
            <a href="/" class="d-flex align-items-center pb-3 text-decoration-none">
                <img class="img-fluid" src="{{ asset('img/logoAntriedark.png') }}" alt="logo-antrie">
            </a>
            <div class="flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                <div class="menu-pengguna d-flex flex-column">
                    <div class="menu-dashboard menu">
                        <i class="bi bi-house"></i><a href="{{ route('beranda') }}">Beranda</a>
                    </div>
                    <div class="menu-antrian menu">
                        <i class="bi bi-archive"></i><a href="{{ route('antreanku') }}">Antreanku</a>
                    </div>
                    <div class="menu-pesan menu">
                        <i class="bi bi-chat-left-text"></i><a href="{{ route('riwayat-antrean') }}">Riwayat</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="dropdown pb-4">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">{{ Auth::user()->nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a></li>

                    {{-- <li>
                        <form action="{{ route('logout') }}" action="POST">
                            {{ csrf_field() }}

                            <button class="dropdown-item" type="submit">Sign Out</button>
                        </form>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>

    {{-- side Nav mobile --}}
    <div class="offcanvas offcanvas-start d-lg-none" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1"
        id="navbar-responsive" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header d-flex align-items-center justify-content-end">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex justify-content-center">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white d-flex justify-content-center coba">
                <div class="d-flex flex-column align-items-center px-3 pt-5 navbar-dashboard">
                    <a href="/" class="d-flex align-items-center pb-3 text-decoration-none">
                        <img class="img-fluid" src="img/logoAntriedark.png" alt="">
                    </a>
                    <div class="flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                        <div class="menu-pengguna-responsive d-flex flex-column justify-content-center">
                            <div class="menu-dashboard menu">
                                <i class="bi bi-house"></i><a href="{{ route('beranda') }}">Beranda</a>
                            </div>
                            <div class="menu-antrian menu ">
                                <i class="bi bi-archive"></i><a href="{{ route('antreanku') }}">Antreanku</a>
                            </div>
                            <div class="menu-pesan menu">
                                <i class="bi bi-chat-left-text"></i><a href="#">Riwayat</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">{{ Auth::user()->nama }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- humburger menu --}}
    <div class="col-1 d-lg-none d-flex flex-column align-items-center position-fixed bg-white" id="side-nav">
        <i class="bi bi-list text-center" data-bs-toggle="offcanvas" data-bs-target="#navbar-responsive"
            aria-controls="navbar-responsive" style="font-size: 2.5rem; color: #2F2D65;"></i>
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
