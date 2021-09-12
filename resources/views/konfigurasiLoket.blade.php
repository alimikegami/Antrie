@extends('layouts/auto-update-layout')

@section('container')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="dashboard-container col-auto col-md-12 py-3 col-lg-10 mt-5 mt-md-0">
                <div class="dashboard-content d-flex flex-column">
                    <div class="field-panggil-antrian d-flex flex-column justify-content-between align-items-center">
                        <div class="row justify-content-center" style="width: 100%">
                            <div class="col-2">
                                <a href="/antreanku/{{ $slug->slug }}" id="back-arrow"
                                    class="d-flex justify-content-center align-items-center align-self-start"><i
                                        class="bi bi-arrow-left"></i></a>
                            </div>
                            <div class="col-8 text-center">
                                <h1>{{ $loket->nama_loket }}</h1>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                        <p>Nomor antrean saat ini</p>
                        <span id="nomorAntrean">{{ $antrean->nomor_antrean ?? '0' }}</span>
                        <div class="spinner-border" role="status" id="spinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="orang-menunggu bg-warning">
                            <p class="mt-0 mb-0 d-flex justify-content-evenly align-items-center"><span
                                    class="badge"
                                    id="jumlahPenunggu">{{ $jumlah_antrean_di_belakang ?? 0 }}</span> orang sedang
                                menunggu</p>
                        </div>
                        <div class="tombol-panggil-antrian d-flex justify-content-evenly align-items-center">
                            <button type="button" class="btn tombol-input-antrian-ol" id="panggilAntrean">Panggil antrean
                                berikutnya
                                &raquo;</button>
                        </div>
                        <div class="tombol-masukan-antrian-offline">
                            <button type="button" class="btn btn-outline-primary tombol-input-antrian-off"
                                id="tambahAntreanOffline">Masukkan antrean
                                offline</button>
                        </div>
                        <input id="inputRiwayatAntreanId" type="text" value="{{ $antrean->id ?? null }}" hidden>
                        <input id="inputLoketId" type="text" value="{{ $loket->id }}" hidden>
                    </div>

                </div>
                @include('components/footer')

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKonfirmasiAntrean" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="modalBodyKonfirmasiAntrean">
            <div class="modal-content d-flex p-2" style="background-color: #2B2844;">
                <div class="exit-modal align-self-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" id="formKonfirmasiAntrean">
                    @csrf
                    <div class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-evenly">
                        <div hidden>
                            <label for="recipient-name" class="col-form-label" hidden>ID Riwayat Antrean</label>
                            <input type="text" class="form-control" id="idRiwayatAntrean111" name="idRiwayatAntrean"
                                hidden>
                        </div>
                        <div hidden>
                            <label for="recipient-name" class="col-form-label" hidden>ID Loket</label>
                            <input type="text" class="form-control" id="idLoket" name="idLoket" hidden>
                        </div>
                        <div class="check-logo mt-5">
                            <svg width="204" height="204" viewBox="0 0 204 204" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M102.75 144.415C102.75 144.001 102.414 143.665 102 143.665C101.586 143.665 101.25 144.001 101.25 144.415H102.75ZM101.25 144.5C101.25 144.914 101.586 145.25 102 145.25C102.414 145.25 102.75 144.914 102.75 144.5H101.25ZM101.25 119C101.25 119.414 101.586 119.75 102 119.75C102.414 119.75 102.75 119.414 102.75 119H101.25ZM75.7759 77.8502C75.668 78.2501 75.9048 78.6617 76.3047 78.7696C76.7046 78.8774 77.1163 78.6407 77.2241 78.2407L75.7759 77.8502ZM101.25 144.415V144.5H102.75V144.415H101.25ZM126.75 84.2273C126.75 92.6662 120.753 96.9028 114.327 101.284C108.026 105.58 101.25 110.042 101.25 119H102.75C102.75 110.958 108.724 106.92 115.173 102.523C121.497 98.2109 128.25 93.5611 128.25 84.2273H126.75ZM102 60.25C115.912 60.25 126.75 71.0023 126.75 84.2273H128.25C128.25 70.1392 116.705 58.75 102 58.75V60.25ZM77.2241 78.2407C80.0051 67.9284 90.2398 60.25 102 60.25V58.75C89.6159 58.75 78.7471 66.8324 75.7759 77.8502L77.2241 78.2407ZM177.75 102C177.75 143.836 143.836 177.75 102 177.75V179.25C144.664 179.25 179.25 144.664 179.25 102H177.75ZM102 177.75C60.1644 177.75 26.25 143.836 26.25 102H24.75C24.75 144.664 59.336 179.25 102 179.25V177.75ZM26.25 102C26.25 60.1644 60.1644 26.25 102 26.25V24.75C59.336 24.75 24.75 59.336 24.75 102H26.25ZM102 26.25C143.836 26.25 177.75 60.1644 177.75 102H179.25C179.25 59.336 144.664 24.75 102 24.75V26.25Z"
                                    fill="#4DB0FF" />
                            </svg>

                        </div>
                        <div class="word-modal-no-loket text-center">
                            <h2>Apakah anda yakin untuk memajukan antrean?</h2>
                        </div>
                        <div
                            class="mt-2 d-flex justify-content-evenly aturLoket-modal-btn-row flex-column align-items-center">
                            <button type="submit" class="btn btn-enter-atur-loket" name="submit">Ya</button>
                            <button type="button" class="btn btn-outline-danger btn-cancel-atur-loket mt-4"
                                data-bs-dismiss="modal">Batalkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAntreanOffline" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="modalBodyKonfirmasiAntrean">
            <div class="modal-content d-flex p-2" style="background-color: #2B2844;">
                <div class="exit-modal align-self-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" id="formAntreanOffline">
                    @csrf
                    <div class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-evenly">
                        <div hidden>
                            <label for="recipient-name" class="col-form-label" hidden>ID Loket</label>
                            <input type="text" class="form-control" id="idLoketOffline" name="idLoketOffline" hidden>
                        </div>
                        <div class="check-logo mt-5">
                            <svg width="204" height="204" viewBox="0 0 204 204" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M102.75 144.415C102.75 144.001 102.414 143.665 102 143.665C101.586 143.665 101.25 144.001 101.25 144.415H102.75ZM101.25 144.5C101.25 144.914 101.586 145.25 102 145.25C102.414 145.25 102.75 144.914 102.75 144.5H101.25ZM101.25 119C101.25 119.414 101.586 119.75 102 119.75C102.414 119.75 102.75 119.414 102.75 119H101.25ZM75.7759 77.8502C75.668 78.2501 75.9048 78.6617 76.3047 78.7696C76.7046 78.8774 77.1163 78.6407 77.2241 78.2407L75.7759 77.8502ZM101.25 144.415V144.5H102.75V144.415H101.25ZM126.75 84.2273C126.75 92.6662 120.753 96.9028 114.327 101.284C108.026 105.58 101.25 110.042 101.25 119H102.75C102.75 110.958 108.724 106.92 115.173 102.523C121.497 98.2109 128.25 93.5611 128.25 84.2273H126.75ZM102 60.25C115.912 60.25 126.75 71.0023 126.75 84.2273H128.25C128.25 70.1392 116.705 58.75 102 58.75V60.25ZM77.2241 78.2407C80.0051 67.9284 90.2398 60.25 102 60.25V58.75C89.6159 58.75 78.7471 66.8324 75.7759 77.8502L77.2241 78.2407ZM177.75 102C177.75 143.836 143.836 177.75 102 177.75V179.25C144.664 179.25 179.25 144.664 179.25 102H177.75ZM102 177.75C60.1644 177.75 26.25 143.836 26.25 102H24.75C24.75 144.664 59.336 179.25 102 179.25V177.75ZM26.25 102C26.25 60.1644 60.1644 26.25 102 26.25V24.75C59.336 24.75 24.75 59.336 24.75 102H26.25ZM102 26.25C143.836 26.25 177.75 60.1644 177.75 102H179.25C179.25 59.336 144.664 24.75 102 24.75V26.25Z"
                                    fill="#4DB0FF" />
                            </svg>

                        </div>
                        <div class="word-modal-no-loket text-center">
                            <h2>Apakah anda yakin untuk menambahkan antrean offline?</h2>
                        </div>
                        <div
                            class="mt-2 d-flex justify-content-evenly aturLoket-modal-btn-row flex-column align-items-center">
                            <button type="submit" class="btn btn-enter-atur-loket" name="submit">Ya</button>
                            <button type="button" class="btn btn-outline-danger btn-cancel-atur-loket mt-4"
                                data-bs-dismiss="modal">Batalkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalNomorAntrean" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="modalBodyKonfirmasiAntrean">
            <div class="modal-content d-flex p-2" style="background-color: #2B2844;">
                <div class="exit-modal align-self-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-evenly">
                    <div class="check-logo mt-5">
                        <svg width="204" height="204" viewBox="0 0 204 204" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M145.03 77.0303C145.323 76.7374 145.323 76.2626 145.03 75.9697C144.737 75.6768 144.263 75.6768 143.97 75.9697L145.03 77.0303ZM84.9998 136L84.4695 136.531C84.7624 136.823 85.2373 136.823 85.5302 136.531L84.9998 136ZM60.0298 109.97C59.7369 109.677 59.262 109.677 58.9691 109.97C58.6763 110.263 58.6763 110.737 58.9692 111.03L60.0298 109.97ZM143.97 75.9697L84.4695 135.47L85.5302 136.531L145.03 77.0303L143.97 75.9697ZM58.9692 111.03L84.4695 136.531L85.5302 135.47L60.0298 109.97L58.9692 111.03ZM177.75 102C177.75 143.836 143.836 177.75 102 177.75V179.25C144.664 179.25 179.25 144.664 179.25 102H177.75ZM102 177.75C60.1644 177.75 26.25 143.836 26.25 102H24.75C24.75 144.664 59.336 179.25 102 179.25V177.75ZM26.25 102C26.25 60.1644 60.1644 26.25 102 26.25V24.75C59.336 24.75 24.75 59.336 24.75 102H26.25ZM102 26.25C143.836 26.25 177.75 60.1644 177.75 102H179.25C179.25 59.336 144.664 24.75 102 24.75V26.25Z"
                                fill="#4DB0FF" />
                        </svg>


                    </div>
                    <div class="word-modal-no-loket text-center">
                        <h2>Nomor Antrean:</h2>
                        <h2 id="nomor-antrean"></h2>
                    </div>
                    <div class="mt-2 d-flex justify-content-evenly aturLoket-modal-btn-row flex-column align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-cancel-atur-loket mt-4"
                            data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
