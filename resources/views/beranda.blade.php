@extends('layouts/main')


@section('container')

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="col-auto col-md-12 py-3 col-lg-10">
                <div class="dashboard-content d-flex flex-column">
                    <div class="container">
                        <div class="first-row d-flex justify-content-between flex-column flex-lg-row">
                            <div class="first-row-word">
                                @auth
                                    <h1>Halo, {{ Auth::user()->nama }}!</h1>
                                @else
                                    <h1>Halo, selamat datang!</h1>
                                @endauth

                                <p>Lorem ipsum dolor sit amet, consectetur. </p>
                            </div>
                            <div class="searchBar-wrapper d-flex justify-content-center align-items-center mb-3 ms-lg-3">
                                <form action="{{ route('search') }}" method="GET"
                                    class="first-row-search d-flex justify-content-center align-items-center flex-md-fill mb-md-3">
                                    <input type="text" id="search-tempat-antrean" placeholder="Cari antrian..."
                                        name="query">
                                    <select class="form-select border-end border-start" id="filter-provinsi"
                                        aria-label="Default select example">
                                        <option selected>Provinsi</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select border-end border-start" id="filter-provinsi"
                                        aria-label="Default select example">
                                        <option selected>Kategori</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <button type="submit" id="search-button"
                                        class="d-flex align-items-center justify-content-center"><i
                                            class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="second-row">
                        <div class="container">
                            <div class="swiper">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    @foreach ($kategori as $temp)
                                        <div class="swiper-slide">
                                            <a href="beranda/{{ $temp->slug }}"><img src="{{ $temp->img_file_path }}"
                                                    alt="" class="slide-image"></a>
                                        </div>
                                    @endforeach

                                </div>
                                <!-- If we need pagination -->
                                <!-- <div class="swiper-pagination"></div> -->

                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>

                                <!-- If we need scrollbar -->
                                <!-- <div class="swiper-scrollbar"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="third-row">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-3">
                                    <div
                                        class="buat-antrian-field d-flex d-md-flex d-lg-block justify-content-evenly align-items-center">
                                        <div class="satu">
                                            <img src="img/personBuatantrian.png" alt="" width="80%">
                                        </div>
                                        <div class="dua">
                                            <h1>Ayo Buat Antrianmu Sendiri</h1>
                                            <p>Tekan tombol dibawah untuk memulai</p>
                                            <a href="{{ route('buat-antrean') }}" type="button"
                                                id="tombol-buat-dashboard">Buat</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-9 mt-5 mt-lg-0 mt-md-3">
                                    <div class="field-lokasi d-flex flex-column">
                                        <div class="word-field-lokasi d-flex flex-column">
                                            <h1>{{ $kategori_populer->nama_kategori }}</h1>
                                            <p>{{ $kategori_populer->antrean_count }} antrean ditemukan</p>
                                        </div>
                                        <div class="content-field-lokasi d-flex flex-column mt-lg-3">
                                            @foreach ($antrean as $temp)
                                                <div class="p-2 hover-wrapper">
                                                    <a href="antrean/{{ $temp->slug }}"
                                                        class="lokasi-wrapper d-flex align-items-center">
                                                        <div
                                                            class="logo-lokasi d-flex justify-content-center align-items-center">
                                                            <div class="gambar">
                                                                <img src="img/logoAntriedark.png" alt="" width="70px">
                                                            </div>
                                                        </div>
                                                        <div class="keterangan-lokasi">
                                                            <h1>{{ $temp->nama_antrean }}</h1>
                                                            <p><i class="bi bi-geo-alt-fill"></i> {{ $temp->alamat }} </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="link-lihat-semua mt-4 d-flex justify-content-center align-items-center">
                                            <a href="/beranda/{{ $kategori_populer->slug }}">Tampilkan Semua</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('components/footer')
            </div>
        </div>
    </div>
@endsection
