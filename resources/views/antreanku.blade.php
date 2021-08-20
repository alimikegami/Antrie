@extends('layouts/main')

@section('container')
    {{-- <h1>{{ session('ID_pengguna') }}</h1>
    @foreach ($antrean as $temp)
        <hr>
        <a href="">
            <h3>{{ $temp->nama_antrean }}</h3>
        </a>
        @foreach ($temp->loket as $item)
            <h4>{{ $item->nama_loket }}</h4>
            @if ($item->status == 'closed')
                <a href="/buka-loket/{{ $item->id }}" class="btn btn-primary" type="button">Open Loket</a>
            @else
                <a href="/tutup-loket/{{ $item->id }}" class="btn btn-primary" type="button">Close Loket</a>
                <a href="/antreanku/antrean/{{ $temp->slug }}/loket/{{ $item->slug }}" class="btn btn-primary"
                    type="button">{{ $item->slug }}</a>
            @endif
        @endforeach
        <hr>
    @endforeach --}}

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-1 col-md-3 col-xl-2 px-sm-2 px-0 bg-white d-flex justify-content-center coba">
                <div class="d-flex flex-column align-items-center px-3 pt-5 min-vh-100 navbar-dashboard">
                    <a href="/" class="d-flex align-items-center pb-3 text-decoration-none nav-menu-logo">
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
                    <div class="first-row-all d-flex justify-content-between flex-column p-3">
                        <div class="first-row-word flex-fill">
                            <h1>Antrian ku</h1>
                        </div>
                    </div>
                    <div class="buat-antrianmu-jumbotron d-flex flex-column justify-content-center align-items-center">
                        <div class="content-buat-antrianmu-jumbotron d-flex align-items-center justify-content-evenly">

                            <img src="{{ asset('img/antrianku-person.png') }}" alt="antrianku-person">

                            <div
                                class="word-buat-antrianmu-jumbotron d-flex justify-content-end align-items-center flex-column text-center">
                                <h1>Ayo Buat Antrianmu Sendiri</h1>
                                <p>Tekan tombol dibawah untuk memulai</p>
                                <button type="button" id="tombol-buat-antrianku">Buat</button>
                            </div>
                        </div>

                    </div>

                    <div class="field-lokasi-all d-flex flex-column mt-5">
                        <div class="content-field-lokasi d-flex flex-column">
                            <div class="p-2 hover-wrapper" id="content-pemilik-antrian">
                                <div class="lokasi-wrapper d-flex align-items-center">
                                    <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                        <div class="gambar">
                                            <img src="img/logoAntriedark.png" alt="" width="70px">
                                        </div>
                                    </div>
                                    <div class="keterangan-loket-antrianku">
                                        <h1>Pukesmas II Denpasar Barat - Loket 1</h1>
                                        <p>Kesehatan</p>
                                        <p class="mt-4"><i class="bi bi-geo-alt-fill"></i> Gg. Puskesmas No.3, Pemecutan
                                            Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119</p>
                                    </div>
                                    <i class="bi bi-arrow-right-circle-fill" id="right-arrow"></i>
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

            </div>
        </div>
    </div>
@endsection
