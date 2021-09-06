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
                                <form action=""
                                    class="first-row-search d-flex justify-content-center align-items-center flex-md-fill mb-md-3">
                                    <input type="text" id="search-tempat-antrean" placeholder="Cari antrian...">
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
