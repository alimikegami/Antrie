@extends('layouts/ambil-antrean-layout')


@section('container')

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white d-flex justify-content-center coba">
                <div class="d-flex flex-column align-items-center px-3 pt-5 min-vh-100 navbar-dashboard">
                    <a href="/" class="d-flex align-items-center pb-3 text-decoration-none">
                        <img class="img-fluid" src="img/logoAntriedark.png" alt="">
                    </a>
                    <div class="flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                        <div class="menu-pengguna d-flex flex-column">
                            <div class="menu-dashboard menu selected">
                                <i class="bi bi-house"></i><a href="#">Dashboard</a>
                            </div>
                            <div class="menu-antrian menu ">
                                <i class="bi bi-archive"></i><a href="#">Antrian ku</a>
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
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">loser</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="dashboard-content d-flex flex-column">
                    <div class="container">
                        <div class="first-row-all d-flex justify-content-between">
                            <div class="first-row-word flex-fill">
                                <h1>Halo, Antrie!</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur. </p>
                            </div>
                            <form action="" class="first-row-search d-flex justify-content-center align-items-center">
                                <input type="text" id="search-tempat-antrean" placeholder="Cari antrian...">
                                <button type="submit" id="search-button"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="third-row-all">
                        <div class="field-lokasi-all d-flex flex-column">
                            <div class="word-field-lokasi d-flex justify-content-end">
                                <div class="filter-area">
                                    <button type="button" id="tombol-filter" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                            class="bi bi-sort-alpha-down"></i>filter</button>
                                </div>
                            </div>
                            <div class="content-field-lokasi d-flex flex-column">
                                <div class="p-2 hover-wrapper">
                                    <a href="#">
                                        <div class="lokasi-wrapper d-flex align-items-center">
                                            <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                                <div class="gambar">
                                                    <img src="img/logoAntriedark.png" alt="" width="70px">
                                                </div>
                                            </div>
                                            <div class="keterangan-lokasi">
                                                <h1>Puskesmas II Denpasar Barat</h1>
                                                <p><i class="bi bi-geo-alt-fill"></i> Gg. Puskesmas No.3, Pemecutan Klod,
                                                    Kec. Denpasar Bar., Kota Denpasar, Bali 80119</p>
                                                <p><i class="bi bi-telephone-fill"></i> 0892929111</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="footer-content">
                        <div class="footer-logo">
                            <img src="img/logoAntrielight.png" alt="">
                        </div>
                        <div class="footer-word1">
                            <ul>
                                <p>Kunjungi kami</p>
                                <li>Instagram</li>
                                <li>Twitter</li>
                                <li>Github</li>
                            </ul>
                        </div>
                        <div class="footer-word2">
                            <ul>
                                <p>Company</p>
                                <li>Contact us</li>
                                <li>Our Customer</li>
                            </ul>
                        </div>
                        <div class="footer-word3">
                            <ul>
                                <p>Support</p>
                                <li>Quick Start Guide</li>
                                <li>Customer Support</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
                    data-bs-scroll="true">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Filter antrian</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        ...
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
