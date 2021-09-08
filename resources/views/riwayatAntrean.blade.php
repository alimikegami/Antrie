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
                                <h1>Riwayat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="field-lokasi-all d-flex flex-column mt-5">
                        <div class="content-field-lokasi d-flex flex-column">
                            {{-- start loop --}}
                            <div class="p-2 hover-wrapper" id="content-tunggu-antrian">
                                <div class="lokasi-wrapper d-flex align-items-center">
                                    <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                        <div class="gambar">
                                            <img src={{ asset('img/logoAntriedark.png') }} alt="logo-antrie" width="70px">
                                        </div>
                                    </div>
                                    <div class="keterangan-loket-riwayat">
                                        <h1>Pukesmas II Denpasar Barat - Loket 1</h1>
                                        <p class="d-flex justify-content-between">07:00 - 12:00 Siang</p>
                                        <p>Estimasi waktu tunggu <span>5</span> menit</p>
                                        <button type="button" id="tombol-ambil-batal-antrian"
                                            class="btn">Batalkan antrian</button>
                                    </div>
                                    <div
                                        class="nomor-antrian d-flex justify-content-evenly align-items-center flex-xl-row flex-column">
                                        <div class="no-antrian-terakhir">
                                            <p>No antrian terakhir</p>
                                            <h1>002</h1>
                                        </div>
                                        <div class="nomor-antrian-mu">
                                            <p>No antrian mu</p>
                                            <h1>010</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end loop --}}

                        </div>
                    </div>

                </div>
                @include('components/footer')

            @endsection
