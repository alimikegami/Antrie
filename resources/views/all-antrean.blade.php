@extends('layouts/main')


@section('container')

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
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
                            @foreach ($antrean as $item)
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
                                                    <h1>{{ $item->nama_antrean }}</h1>
                                                    <p><i class="bi bi-geo-alt-fill"></i>{{ $item->alamat }}</p>
                                                    <p><i class="bi bi-telephone-fill"></i>{{ $item->nomor_telepon }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

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
