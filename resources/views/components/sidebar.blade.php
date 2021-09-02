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
                        <i class="bi bi-chat-left-text"></i><a href="#">Pesan</a>
                    </div>
                    <div class="menu-profil menu">
                        <i class="bi bi-person"></i><a href="#">Profil</a>
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
                    <li><a class="dropdown-item" href="/">Sign out</a></li>
                </ul>
            </div>
        </div>
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
