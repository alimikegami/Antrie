@extends('layouts/ambil-antrean-layout')


@section('container')


    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white d-flex justify-content-center coba">
                <div class="d-flex flex-column align-items-center px-3 pt-5 min-vh-100 navbar-dashboard">
                    <a href="/" class="d-flex align-items-center pb-3 text-decoration-none">
                        <img class="img-fluid" src="{{ asset('img/logoAntriedark.png') }}" alt="">
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
                            <span class="d-none d-sm-inline mx-1">{{ Auth::user()->nama }}</span>
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
                    <div class="loket-lokasi d-flex flex-column">
                        <div class="content-field-lokasi d-flex flex-column">
                            <div class="lokasi-wrapper d-flex align-items-center">
                                <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                    <div class="gambar">
                                        <img src="{{ asset('img/logoAntriedark.png') }}" alt="" width="70px">
                                    </div>
                                </div>
                                <div class="keterangan-lokasi">
                                    <h1>{{ $antrean->nama_antrean }}</h1>
                                    <p><i class="bi bi-geo-alt-fill"></i> {{ $antrean->alamat }}</p>
                                    <p><i class="bi bi-telephone-fill"></i> {{ $antrean->nomor_telepon }}</p>
                                    <div class="covid-case bg-warning">
                                        {{-- <p class="d-flex justify-content-between align-items-center">Kasus Covid-19 di
                                            {{ $antrean->provinsi }}
                                            <span class="badge">{{ $kasus_covid }} per hari</span>
                                        </p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="deskripsi-attactment mt-3">
                                <p>{{ $antrean->deskripsi }}</p>
                                <a href="/images/myw3schoolsimage.jpg" download>
                                    attactment.pdf
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="field-lokasi-all d-flex flex-column">
                        <div class="content-field-lokasi d-flex flex-column">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($antrean->loket as $temp)
                                <div class="p-2 hover-wrapper">
                                    <div class="lokasi-wrapper d-flex align-items-center">
                                        <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                            <div class="gambar">
                                                <img src="{{ asset('img/logoAntriedark.png') }}" alt="" width="70px">
                                            </div>
                                        </div>
                                        <div class="keterangan-loket">
                                            <h1>{{ $temp->nama_loket }}</h1>
                                            <p class="d-flex justify-content-between">{{ $temp->waktu_buka }} -
                                                {{ $temp->waktu_tutup }} <span
                                                    class="badge {{ $temp->status }}">{{ $temp->status }}</span></p>

                                            @if (in_array($temp->id, $loket_tempat_mengantre))
                                                <p id="sudah-terdaftar-{{ $i }}" }}>Anda terdaftar dalam loket
                                                    ini</p>
                                                <button type="button" id="tombol-riwayat-antrian-{{ $i }}"
                                                    class="btn btn-riwayat-antrean">Lihat Antrean</button>
                                                <p id="belum-terdaftar-{{ $i }}" hidden>Terdapat
                                                    <span>{{ $antrean_di_depan[$i] }}</span> antrian di depan anda
                                                </p>
                                                <button type="button" id="tombol-ambil-antrian-{{ $i }}"
                                                    class="btn tombol-ambil-antrian" hidden>Ambil Nomor</button>
                                            @else
                                                <p id="sudah-terdaftar-{{ $i }}" }} hidden>Anda terdaftar dalam
                                                    loket ini</p>
                                                <button type="button" id="tombol-riwayat-antrian-{{ $i }}"
                                                    class="btn btn-riwayat-antrean" hidden>Lihat Antrean</button>
                                                <p id="belum-terdaftar-{{ $i }}">Terdapat
                                                    <span>{{ $antrean_di_depan[$i] }}</span> antrian di depan anda
                                                </p>
                                                <button type="button" id="tombol-ambil-antrian-{{ $i }}"
                                                    class="btn tombol-ambil-antrian">Ambil Nomor</button>
                                            @endif
                                            <input id="input-id-loket-{{ $i }}" type="text"
                                                value="{{ $temp->slug }}" hidden>
                                            @php
                                                $i = $i + 1;
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <input type="text" id="slug-antrean" value="{{ $antrean->slug }}" hidden>
                        </div>
                    </div>

                </div>
                <div class="footer">
                    <div class="footer-content">
                        <div class="footer-logo">
                            <img src="{{ asset('img/logoAntrielight.png') }}" alt="">
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

                <!-- Modal -->
                <div class="modal fade" id="modal-ambil-nomor" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div
                                class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-between">
                                <div class="exit-modal align-self-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="check-logo mt-5">
                                    <svg width="127" height="127" viewBox="0 0 127 127" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M90.4887 48.1553C90.7816 47.8624 90.7816 47.3876 90.4887 47.0947C90.1958 46.8018 89.7209 46.8018 89.428 47.0947L90.4887 48.1553ZM52.9166 84.6668L52.3862 85.1971C52.6791 85.49 53.154 85.49 53.4469 85.1971L52.9166 84.6668ZM37.5717 68.2613C37.2788 67.9684 36.8039 67.9684 36.511 68.2613C36.2181 68.5542 36.2181 69.0291 36.511 69.322L37.5717 68.2613ZM89.428 47.0947L52.3862 84.1364L53.4469 85.1971L90.4887 48.1553L89.428 47.0947ZM36.511 69.322L52.3862 85.1971L53.4469 84.1364L37.5717 68.2613L36.511 69.322ZM110.375 63.5C110.375 89.3883 89.3883 110.375 63.5 110.375V111.875C90.2168 111.875 111.875 90.2168 111.875 63.5H110.375ZM63.5 110.375C37.6117 110.375 16.625 89.3883 16.625 63.5H15.125C15.125 90.2168 36.7832 111.875 63.5 111.875V110.375ZM16.625 63.5C16.625 37.6117 37.6117 16.625 63.5 16.625V15.125C36.7832 15.125 15.125 36.7832 15.125 63.5H16.625ZM63.5 16.625C89.3883 16.625 110.375 37.6117 110.375 63.5H111.875C111.875 36.7832 90.2168 15.125 63.5 15.125V16.625Z"
                                            fill="#4DB0FF" />
                                    </svg>
                                </div>
                                <div class="word-modal-no-loket text-center">
                                    <p>Nomor antrean anda di</p>
                                    <h2 class="mb-3" id="nama-antrean-modal"></h2>
                                    <p>Pada loket</p>
                                    <h3 id="nama-loket-modal"></h3>
                                </div>
                                <h1 id="nomor-antrean-modal"></h1>
                                <button type="button" id="tombol-detail-antrian" class="btn">Lihat detail antrian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
