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
        <div class="row flex-nowrap" style="height: 100%">
            @include('components/sidebar')
            <div class="dashboard-container col-auto col-md-12 py-3 col-lg-10 mt-5 mt-md-0">
                <div class="dashboard-content d-flex flex-column" {!! count($antrean) == 0 ? "style='height: 75vh'" : '' !!}>
                    <div class="first-row-all d-flex justify-content-between flex-column p-3">
                        <div class="first-row-word flex-fill">
                            <h1>Antreanku</h1>
                        </div>
                    </div>
                    <div class="buat-antrianmu-jumbotron d-flex flex-column justify-content-center align-items-center">
                        <div class="content-buat-antrianmu-jumbotron d-flex align-items-center justify-content-evenly">

                            <img src="img/antrianku-person.png" class="img-fluid" alt="antrianku-person">

                            <div
                                class="word-buat-antrianmu-jumbotron d-flex justify-content-end align-items-center flex-column text-center">
                                <h1>Ayo Buat Antreanmu Sendiri</h1>
                                <p>Tekan tombol dibawah untuk memulai</p>
                                <a href="{{ route('buat-antrean') }}" type="button" id="tombol-buat-antrianku">Buat</a>
                            </div>
                        </div>

                    </div>
                    @if (count($antrean) == 0)
                        <h3 class="text-center mt-5 text-muted align-self-center">Belum ada antrean</h3>
                    @endif

                    @foreach ($antrean as $item)
                        <div class="field-lokasi-all-antrianku d-flex flex-column mt-5">
                            <div class="content-field-lokasi d-flex flex-column">
                                <a href="/antreanku/{{ $item->slug }}">
                                    <div class="p-2 hover-wrapper mb-0" id="content-pemilik-antrian">
                                        <div class="lokasi-wrapper d-flex align-items-center">
                                            <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                                <div class="gambar">
                                                    @if ($item->file_path_img)

                                                        <img src="{{ asset('storage/pictures/' . $item->file_path_img) }}"
                                                            alt="" width="70px">
                                                    @else
                                                        <img src="img/logoAntriedark.png" alt="" width="70px">
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="keterangan-loket-antrianku">
                                                <h1>{{ $item->nama_antrean }}</h1>
                                                <p>{{ $item->kategori->nama_kategori }}</p>
                                                <p class="mt-md-4"><i
                                                        class="bi bi-geo-alt-fill"></i>{{ $item->alamat }}</p>

                                            </div>
                                            <i class="bi bi-arrow-right-circle-fill" id="right-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                @include('components/footer')

            </div>
        </div>
    </div>
@endsection
