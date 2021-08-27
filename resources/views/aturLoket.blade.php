@extends('layouts/main')

@section('container')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="col py-3">
                <div class="dashboard-content d-flex flex-column">
                    <div class="atur-loket-lokasi d-flex flex-column">
                        <a href="antrianku.html" id="back-arrow"
                            class="d-flex justify-content-center align-items-center mb-2"><i
                                class="bi bi-arrow-left"></i></a>
                        <div class="d-flex flex-column">
                            <div class="lokasi-wrapper d-flex align-items-center">
                                <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                    <div class="gambar">
                                        <img src="img/logoAntriedark.png" alt="" width="70px">
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
                            <a href="#" class="btn align-self-start" id="btn-ubah-antrian">Ubah data antrian</a>
                        </div>
                    </div>

                    <div class="field-lokasi-all d-flex flex-column">
                        <div class="content-field-lokasi d-flex flex-column">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($antrean->loket as $item)
                                <div class="p-2 hover-wrapper" id="content-pemilik-antrian">
                                    <div class="lokasi-wrapper d-flex align-items-center">
                                        <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                            <div class="gambar">
                                                <img src="img/logoAntriedark.png" alt="" width="70px">
                                            </div>
                                        </div>
                                        <div class="keterangan-loket-pemilik">
                                            <h1>{{ $item->nama_loket }}</h1>
                                            <p>{{ $item->waktu_buka }} - {{ $item->waktu_tutup }}
                                                @if ($item->status == 'open')
                                                    <span class="badge open">open</span>
                                                @else
                                                    <span class="badge closed">closed</span>
                                                @endif

                                            </p>
                                            <p>Terdapat <span>{{ $antrean_di_belakang[$i] }}</span> orang mengantre</p>
                                            @php
                                                $i = $i + 1;
                                            @endphp
                                            @if ($item->status == 'open')
                                                <button type="button" class="tombol-tutup-loket"
                                                    id="tombol-tutup-loket-{{ $i }}" class="btn"
                                                    data-id-loket="{{ $item->id }}" onclick="">Close
                                                    Loket</button>
                                            @else
                                                <button type="button" class="tombol-buka-loket"
                                                    id="tombol-buka-loket-{{ $i }}" class="btn"
                                                    data-id-loket="{{ $item->id }}">Open
                                                    Loket</button>
                                            @endif

                                        </div>
                                        <i class="bi bi-arrow-right-circle-fill" id="right-arrow"></i>
                                    </div>
                                </div>
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-between">
                    <div class="exit-modal align-self-end">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="/buka-loket" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="check-logo mt-5">
                            <svg width="127" height="127" viewBox="0 0 127 127" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M90.4887 48.1553C90.7816 47.8624 90.7816 47.3876 90.4887 47.0947C90.1958 46.8018 89.7209 46.8018 89.428 47.0947L90.4887 48.1553ZM52.9166 84.6668L52.3862 85.1971C52.6791 85.49 53.154 85.49 53.4469 85.1971L52.9166 84.6668ZM37.5717 68.2613C37.2788 67.9684 36.8039 67.9684 36.511 68.2613C36.2181 68.5542 36.2181 69.0291 36.511 69.322L37.5717 68.2613ZM89.428 47.0947L52.3862 84.1364L53.4469 85.1971L90.4887 48.1553L89.428 47.0947ZM36.511 69.322L52.3862 85.1971L53.4469 84.1364L37.5717 68.2613L36.511 69.322ZM110.375 63.5C110.375 89.3883 89.3883 110.375 63.5 110.375V111.875C90.2168 111.875 111.875 90.2168 111.875 63.5H110.375ZM63.5 110.375C37.6117 110.375 16.625 89.3883 16.625 63.5H15.125C15.125 90.2168 36.7832 111.875 63.5 111.875V110.375ZM16.625 63.5C16.625 37.6117 37.6117 16.625 63.5 16.625V15.125C36.7832 15.125 15.125 36.7832 15.125 63.5H16.625ZM63.5 16.625C89.3883 16.625 110.375 37.6117 110.375 63.5H111.875C111.875 36.7832 90.2168 15.125 63.5 15.125V16.625Z"
                                    fill="#4DB0FF" />
                            </svg>
                        </div>
                        <div class="word-modal-no-loket text-center">
                            <p>Apakah anda yakin untuk membuka loket ini?</p>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="id_loket_buka" name="id_loket_buka" hidden>
                        </div>
                        <div class="text-center mt-2">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                            <button id="submit" type="submit" class="btn btn-success" name="submit">Buka</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-konfirmasi-tutup-loket" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body modal-body-loket d-flex flex-column align-items-center justify-content-between">
                    <div class="exit-modal align-self-end">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="/tutup-loket" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="check-logo mt-5">
                            <svg width="127" height="127" viewBox="0 0 127 127" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M90.4887 48.1553C90.7816 47.8624 90.7816 47.3876 90.4887 47.0947C90.1958 46.8018 89.7209 46.8018 89.428 47.0947L90.4887 48.1553ZM52.9166 84.6668L52.3862 85.1971C52.6791 85.49 53.154 85.49 53.4469 85.1971L52.9166 84.6668ZM37.5717 68.2613C37.2788 67.9684 36.8039 67.9684 36.511 68.2613C36.2181 68.5542 36.2181 69.0291 36.511 69.322L37.5717 68.2613ZM89.428 47.0947L52.3862 84.1364L53.4469 85.1971L90.4887 48.1553L89.428 47.0947ZM36.511 69.322L52.3862 85.1971L53.4469 84.1364L37.5717 68.2613L36.511 69.322ZM110.375 63.5C110.375 89.3883 89.3883 110.375 63.5 110.375V111.875C90.2168 111.875 111.875 90.2168 111.875 63.5H110.375ZM63.5 110.375C37.6117 110.375 16.625 89.3883 16.625 63.5H15.125C15.125 90.2168 36.7832 111.875 63.5 111.875V110.375ZM16.625 63.5C16.625 37.6117 37.6117 16.625 63.5 16.625V15.125C36.7832 15.125 15.125 36.7832 15.125 63.5H16.625ZM63.5 16.625C89.3883 16.625 110.375 37.6117 110.375 63.5H111.875C111.875 36.7832 90.2168 15.125 63.5 15.125V16.625Z"
                                    fill="#4DB0FF" />
                            </svg>
                        </div>
                        <div class="word-modal-no-loket text-center">
                            <p>Apakah anda yakin untuk menutup loket ini?</p>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="id_loket_tutup" name="id_loket_tutup" hidden>
                        </div>
                        <div class="text-center mt-2">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                            <button id="submit" type="submit" class="btn btn-success" name="submit">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
