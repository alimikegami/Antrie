@extends('layouts/main')


@section('container')

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="col py-3">
                <div class="dashboard-content d-flex flex-column">
                    <div class="container-fluid">
                        <div class="first-row-all d-flex justify-content-between flex-column flex-lg-row">
                            <div class="first-row-word flex-fill">
                                <h1>{{ $count }} antrean ditemukan</h1>
                            </div>
                            <div class="searchBar-wrapper d-flex justify-content-center align-items-center mb-3">
                                <form action="{{ route('search') }}"
                                    class="first-row-search d-flex justify-content-center align-items-center flex-md-fill mb-md-3">
                                    <input type="text" id="search-tempat-antrean" placeholder="Cari antrian..." name="query">
                                    <select class="form-select border-end border-start" id="filter-provinsi"
                                        aria-label="Default select example" name="provinsi">
                                        <option selected value="">Provinsi</option>
                                        <option value="DKI JAKARTA">DKI Jakarta</option>
                                        <option value="JAWA BARAT">Jawa Barat</option>
                                        <option value="JAWA TENGAH">Jawa Tengah</option>
                                        <option value="JAWA TIMUR">Jawa Timur</option>
                                        <option value="KALIMANTAN TIMUR">Kalimantan Timur</option>
                                        <option value="DAERAH ISTIMEWA YOGYAKARTA">Daerah Istimewa Yogyakarta</option>
                                        <option value="BANTEN">Banten</option>
                                        <option value="RIAU">Riau</option>
                                        <option value="SULAWESI SELATAN">Sulawesi Selatan</option>
                                        <option value="BALI">Bali</option>
                                        <option value="SUMATERA BARAT">Sumatera Barat</option>
                                        <option value="SUMATERA UTARA">Sumatera Utara</option>
                                        <option value="KALIMANTAN SELATAN">Kalimantan Selatan</option>
                                        <option value="SUMATERA SELATAN">Sumatera Selatan</option>
                                        <option value="NUSA TENGGARA TIMUR">Nusa Tenggara Timur</option>
                                        <option value="KEPULAUAN RIAU">Kepulauan Riau</option>
                                        <option value="LAMPUNG">Lampung</option>
                                        <option value="KEPULAUAN BANGKA BELITUNG">Kepulauan Bangka Belitung</option>
                                        <option value="KALIMANTAN TENGAH">Kalimantan Tengah</option>
                                        <option value="SULAWESI TENGAH">Sulawesi Tengah</option>
                                        <option value="KALIMANTAN BARAT">Kalimantan Barat</option>
                                        <option value="PAPUA">Papua</option>
                                        <option value="SULAWESI UTARA">Sulawesi Utara</option>
                                        <option value="KALIMANTAN UTARA">Kalimantan Utara</option>
                                        <option value="PAPUA">Papua</option>
                                        <option value="JAMBI">Jambi</option>
                                        <option value="NUSA TENGGARA BARAT">Nusa Tenggara Barat</option>
                                        <option value="PAPUA BARAT">Papua Barat</option>
                                        <option value="BENGKULU">Bengkulu</option>
                                        <option value="SULAWESI TENGGARA">Sulawesi Tenggara</option>
                                        <option value="MALUKU">Maluku</option>
                                        <option value="MALUKU UTARA">Maluku Utara</option>
                                        <option value="SULAWESI BARAT">Sulawesi Barat</option>
                                        <option value="GORONTALO">Gorontalo</option>
                                    </select>
                                    <select class="form-select border-end border-start" id="filter-kategori"
                                        aria-label="Default select example" name="kategori">
                                        <option selected value="">Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" id="search-button"
                                        class="d-flex align-items-center justify-content-center"><i
                                            class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="third-row-all">
                        <div class="field-lokasi-all d-flex flex-column">
                            <div class="content-field-lokasi d-flex flex-column">
                                @foreach ($antrean as $item)
                                    <div class="p-2 hover-wrapper">
                                        <a href="#">
                                            <div class="lokasi-wrapper d-flex align-items-center">
                                                <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                                    <div class="gambar">
                                                        <img src="{{ asset('img/logoAntriedark.png') }}" alt=""
                                                            width="70px">
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
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                @include('components/footer')


                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
                    data-bs-scroll="true">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Filter antrean</h5>
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
