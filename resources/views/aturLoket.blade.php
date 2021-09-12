@extends('layouts/main')

@section('container')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="dashboard-container col-auto col-md-12 py-3 col-lg-10 mt-5 mt-md-0">
                <div class="dashboard-content d-flex flex-column">
                    <div class="atur-loket-lokasi d-flex flex-column">
                        <a href="/antreanku" id="back-arrow" class="d-flex justify-content-center align-items-center mb-2"><i
                                class="bi bi-arrow-left"></i></a>
                        <div class="d-flex flex-column">
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
                                </div>
                            </div>
                            <div class="deskripsi-attactment mt-3">
                                <p>{{ $antrean->deskripsi }}</p>
                            </div>
                            <a href="/ubah-data-antrean/{{ $antrean->slug }}" class="btn align-self-start"
                                id="btn-ubah-antrian">Ubah Data Antrean</a>
                        </div>
                    </div>

                    <div class="field-lokasi-all d-flex flex-column">
                        <div class="content-field-lokasi d-flex flex-column">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($antrean->loket as $item)
                                <a href="/antreanku/{{ $antrean->slug }}/loket/{{ $item->slug }}">
                                    <div class="p-2 hover-wrapper" id="content-pemilik-antrian">
                                        <div class="lokasi-wrapper d-flex align-items-center">
                                            <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                                <div class="gambar">
                                                    <img src="{{ asset('img/logoAntriedark.png') }}" alt="" width="70px">
                                                </div>
                                            </div>
                                            <div class="keterangan-loket-pemilik">
                                                <h1>{{ $item->nama_loket }}</h1>
                                                <p>{{ $item->waktu_buka }} - {{ $item->waktu_tutup }}
                                                    @if ($item->status == 'open')
                                                        <span class="badge open ms-1 ms-md-3">buka</span>
                                                    @else
                                                        <span class="badge closed ms-md-3">tutup</span>
                                                    @endif

                                                </p>
                                                <p>Terdapat <span>{{ $antrean_di_belakang[$i] }}</span> orang mengantre
                                                </p>
                                                @php
                                                    $i = $i + 1;
                                                @endphp
                                                <div class="row align-items-center">
                                                    <div class="col-xl-2 col-lg-5 col-md-5 col-6">
                                                        @if ($item->status == 'open')
                                                            <button type="button" class="tombol-tutup-loket"
                                                                id="tombol-tutup-loket-{{ $i }}"
                                                                class="btn" data-id-loket="{{ $item->id }}"
                                                                onclick="">Tutup
                                                                Loket</button>
                                                        @else
                                                            <button type="button" class="tombol-buka-loket"
                                                                id="tombol-buka-loket-{{ $i }}"
                                                                class="btn"
                                                                data-id-loket="{{ $item->id }}">Buka
                                                                Loket</button>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="col-xl-3 col-lg-4 col-6 col-md-5 d-flex justify-content-start align-items-center">
                                                        <button
                                                            class="btn btn-outline-danger btn-sm rounded-pill btn-delete-loket"
                                                            id="tombol-hapus-loket-{{ $i }}" data-id-loket="{{ $item->id }}"><i class="bi bi-trash-fill"></i> hapus
                                                            loket</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <i class="bi bi-arrow-right-circle-fill" id="right-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
                @include('components/footer')
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-konfirmasi-buka-loket" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered d-flex justify-content-center align-items-center">
            <div class="modal-content d-flex p-2" style="background-color: #2B2844;">
                <div class="exit-modal align-self-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="/buka-loket" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-evenly">

                        <div class="check-logo mt-5">
                            <svg width="204" height="204" viewBox="0 0 204 204" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M102.75 144.415C102.75 144.001 102.414 143.665 102 143.665C101.586 143.665 101.25 144.001 101.25 144.415H102.75ZM101.25 144.5C101.25 144.914 101.586 145.25 102 145.25C102.414 145.25 102.75 144.914 102.75 144.5H101.25ZM101.25 119C101.25 119.414 101.586 119.75 102 119.75C102.414 119.75 102.75 119.414 102.75 119H101.25ZM75.7759 77.8502C75.668 78.2501 75.9048 78.6617 76.3047 78.7696C76.7046 78.8774 77.1163 78.6407 77.2241 78.2407L75.7759 77.8502ZM101.25 144.415V144.5H102.75V144.415H101.25ZM126.75 84.2273C126.75 92.6662 120.753 96.9028 114.327 101.284C108.026 105.58 101.25 110.042 101.25 119H102.75C102.75 110.958 108.724 106.92 115.173 102.523C121.497 98.2109 128.25 93.5611 128.25 84.2273H126.75ZM102 60.25C115.912 60.25 126.75 71.0023 126.75 84.2273H128.25C128.25 70.1392 116.705 58.75 102 58.75V60.25ZM77.2241 78.2407C80.0051 67.9284 90.2398 60.25 102 60.25V58.75C89.6159 58.75 78.7471 66.8324 75.7759 77.8502L77.2241 78.2407ZM177.75 102C177.75 143.836 143.836 177.75 102 177.75V179.25C144.664 179.25 179.25 144.664 179.25 102H177.75ZM102 177.75C60.1644 177.75 26.25 143.836 26.25 102H24.75C24.75 144.664 59.336 179.25 102 179.25V177.75ZM26.25 102C26.25 60.1644 60.1644 26.25 102 26.25V24.75C59.336 24.75 24.75 59.336 24.75 102H26.25ZM102 26.25C143.836 26.25 177.75 60.1644 177.75 102H179.25C179.25 59.336 144.664 24.75 102 24.75V26.25Z"
                                    fill="#4DB0FF" />
                            </svg>

                        </div>
                        <div class="word-modal-no-loket text-center">
                            <h2>Apakah anda yakin untuk membuka loket ini?</h2>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="id_loket_buka" name="id_loket_buka" hidden>
                        </div>
                        <div
                            class="mt-2 d-flex justify-content-evenly aturLoket-modal-btn-row flex-column align-items-center">
                            <button id="submit" type="submit" class="btn btn-enter-atur-loket" name="submit">Buka
                                loket</button>
                            <button type="button" class="btn btn-outline-danger btn-cancel-atur-loket mt-4"
                                data-bs-dismiss="modal">Batalkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-konfirmasi-tutup-loket" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered d-flex justify-content-center align-items-center">
            <div class="modal-content d-flex p-2" style="background-color: #2B2844;">
                <div class="exit-modal align-self-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="/tutup-loket" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-evenly">

                        <div class="check-logo mt-5">
                            <svg width="204" height="204" viewBox="0 0 204 204" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M102.75 144.415C102.75 144.001 102.414 143.665 102 143.665C101.586 143.665 101.25 144.001 101.25 144.415H102.75ZM101.25 144.5C101.25 144.914 101.586 145.25 102 145.25C102.414 145.25 102.75 144.914 102.75 144.5H101.25ZM101.25 119C101.25 119.414 101.586 119.75 102 119.75C102.414 119.75 102.75 119.414 102.75 119H101.25ZM75.7759 77.8502C75.668 78.2501 75.9048 78.6617 76.3047 78.7696C76.7046 78.8774 77.1163 78.6407 77.2241 78.2407L75.7759 77.8502ZM101.25 144.415V144.5H102.75V144.415H101.25ZM126.75 84.2273C126.75 92.6662 120.753 96.9028 114.327 101.284C108.026 105.58 101.25 110.042 101.25 119H102.75C102.75 110.958 108.724 106.92 115.173 102.523C121.497 98.2109 128.25 93.5611 128.25 84.2273H126.75ZM102 60.25C115.912 60.25 126.75 71.0023 126.75 84.2273H128.25C128.25 70.1392 116.705 58.75 102 58.75V60.25ZM77.2241 78.2407C80.0051 67.9284 90.2398 60.25 102 60.25V58.75C89.6159 58.75 78.7471 66.8324 75.7759 77.8502L77.2241 78.2407ZM177.75 102C177.75 143.836 143.836 177.75 102 177.75V179.25C144.664 179.25 179.25 144.664 179.25 102H177.75ZM102 177.75C60.1644 177.75 26.25 143.836 26.25 102H24.75C24.75 144.664 59.336 179.25 102 179.25V177.75ZM26.25 102C26.25 60.1644 60.1644 26.25 102 26.25V24.75C59.336 24.75 24.75 59.336 24.75 102H26.25ZM102 26.25C143.836 26.25 177.75 60.1644 177.75 102H179.25C179.25 59.336 144.664 24.75 102 24.75V26.25Z"
                                    fill="#4DB0FF" />
                            </svg>
                        </div>
                        <div class="word-modal-no-loket text-center">
                            <h2>Apakah anda yakin untuk menutup loket ini?</h2>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="id_loket_tutup" name="id_loket_tutup" hidden readonly>
                        </div>
                        <div
                            class="mt-2 d-flex justify-content-evenly aturLoket-modal-btn-row flex-column align-items-center">
                            <button id="submit" type="submit" class="btn-enter-atur-loket" name="submit">Tutup
                                loket</button>
                            <button type="button" class="btn btn-outline-danger btn-cancel-atur-loket mt-4"
                                data-bs-dismiss="modal">Batalkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteLoketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('hapus-loket') }}" method="POST">
                    @csrf
                    <div class="modal-body border-0 text-center">
                        <div class="check-logo mt-3">
                            <svg width="204" height="204" viewBox="0 0 204 204" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M102.75 144.415C102.75 144.001 102.414 143.665 102 143.665C101.586 143.665 101.25 144.001 101.25 144.415H102.75ZM101.25 144.5C101.25 144.914 101.586 145.25 102 145.25C102.414 145.25 102.75 144.914 102.75 144.5H101.25ZM101.25 119C101.25 119.414 101.586 119.75 102 119.75C102.414 119.75 102.75 119.414 102.75 119H101.25ZM75.7759 77.8502C75.668 78.2501 75.9048 78.6617 76.3047 78.7696C76.7046 78.8774 77.1163 78.6407 77.2241 78.2407L75.7759 77.8502ZM101.25 144.415V144.5H102.75V144.415H101.25ZM126.75 84.2273C126.75 92.6662 120.753 96.9028 114.327 101.284C108.026 105.58 101.25 110.042 101.25 119H102.75C102.75 110.958 108.724 106.92 115.173 102.523C121.497 98.2109 128.25 93.5611 128.25 84.2273H126.75ZM102 60.25C115.912 60.25 126.75 71.0023 126.75 84.2273H128.25C128.25 70.1392 116.705 58.75 102 58.75V60.25ZM77.2241 78.2407C80.0051 67.9284 90.2398 60.25 102 60.25V58.75C89.6159 58.75 78.7471 66.8324 75.7759 77.8502L77.2241 78.2407ZM177.75 102C177.75 143.836 143.836 177.75 102 177.75V179.25C144.664 179.25 179.25 144.664 179.25 102H177.75ZM102 177.75C60.1644 177.75 26.25 143.836 26.25 102H24.75C24.75 144.664 59.336 179.25 102 179.25V177.75ZM26.25 102C26.25 60.1644 60.1644 26.25 102 26.25V24.75C59.336 24.75 24.75 59.336 24.75 102H26.25ZM102 26.25C143.836 26.25 177.75 60.1644 177.75 102H179.25C179.25 59.336 144.664 24.75 102 24.75V26.25Z"
                                    fill="#4DB0FF" />
                            </svg>
                        </div>
                        <h2 class="my-3">Hapus loket?</h2>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="id_loket_hapus" name="id_loket_hapus" readonly hidden>
                    </div>
                    <div class="modal-footer border-0 d-flex justify-content-center py-5">
                        <div class="mt-2 d-flex justify-content-evenly aturLoket-modal-btn-row flex-column align-items-center">
                            <button id="submit" type="submit" class="btn btn-enter-atur-loket" name="submit">Hapus
                                loket</button>
                            <button type="button" class="btn btn-outline-danger btn-cancel-atur-loket mt-4"
                                data-bs-dismiss="modal">Batalkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
