@extends('layouts/main')


@section('container')

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="col-auto col-md-12 py-3 col-lg-10">
                <div class="dashboard-content d-flex flex-column">
                    <div class="container">
                        <div class="first-row d-flex justify-content-between">
                            <div class="first-row-word">
                                <h1>Halo, {{ Auth::user()->nama }}!</h1>
                                <p>{Lorem ipsum dolor sit amet, consectetur. }</p>
                            </div>
                            <form action="" class="first-row-search d-flex justify-content-center align-items-center">
                                <input type="text" id="search-tempat-antrean" placeholder="Cari antrian...">
                                <button type="submit" id="search-button"><i class="bi bi-search"></i></button>
                            </form>
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
                                            <p>{{ $kategori_populer->antrean_count }} lokasi ditemukan</p>
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
                                            <a href="/all-antrean">Show all</a>
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
