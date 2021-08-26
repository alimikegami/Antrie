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
                                    <h1>Puskesmas II Denpasar Barat</h1>
                                    <p><i class="bi bi-geo-alt-fill"></i> Gg. Puskesmas No.3, Pemecutan Klod, Kec. Denpasar
                                        Bar., Kota Denpasar, Bali 80119</p>
                                    <p><i class="bi bi-telephone-fill"></i> 0892929111</p>
                                </div>
                            </div>
                            <div class="deskripsi-attactment mt-3">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae incidunt aliquid eius vero
                                    velit nesciunt amet exercitationem pariatur, dignissimos veritatis.</p>
                            </div>
                            <a href="#" class="btn align-self-start" id="btn-ubah-antrian">Ubah data antrian</a>
                        </div>
                    </div>

                    <div class="field-lokasi-all d-flex flex-column">
                        <div class="content-field-lokasi d-flex flex-column">
                            <div class="p-2 hover-wrapper" id="content-pemilik-antrian">
                                <div class="lokasi-wrapper d-flex align-items-center">
                                    <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                        <div class="gambar">
                                            <img src="img/logoAntriedark.png" alt="" width="70px">
                                        </div>
                                    </div>
                                    <div class="keterangan-loket-pemilik">
                                        <h1>Loket 1</h1>
                                        <p>07:00 - 12:00 Siang <span class="badge open">Open</span></p>
                                        <p>Terdapat <span>5</span> orang mengantri</p>
                                        <button type="button" class="tombol-tutup-loket" class="btn">Close Loket</button>
                                    </div>
                                    <i class="bi bi-arrow-right-circle-fill" id="right-arrow"></i>
                                </div>
                            </div>
                            <div class="p-2 hover-wrapper" id="content-pemilik-antrian">
                                <div class="lokasi-wrapper d-flex align-items-center">
                                    <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                        <div class="gambar">
                                            <img src="img/logoAntriedark.png" alt="" width="70px">
                                        </div>
                                    </div>
                                    <div class="keterangan-loket-pemilik">
                                        <h1>Loket 1</h1>
                                        <p>07:00 - 12:00 Siang <span class="badge closed">Closed</span></p>
                                        <p>Terdapat <span>5</span> orang mengantri</p>
                                        <button type="button" class="tombol-buka-loket" class="btn">Open Loket</button>
                                    </div>
                                    <i class="bi bi-arrow-right-circle-fill" id="right-arrow"></i>
                                </div>
                            </div>
                            <div class="p-2 hover-wrapper" id="content-pemilik-antrian">
                                <div class="lokasi-wrapper d-flex align-items-center">
                                    <div class="logo-lokasi d-flex justify-content-center align-items-center">
                                        <div class="gambar">
                                            <img src="img/logoAntriedark.png" alt="" width="70px">
                                        </div>
                                    </div>
                                    <div class="keterangan-loket-pemilik">
                                        <h1>Loket 1</h1>
                                        <p>07:00 - 12:00 Siang <span class="badge open">Open</span></p>
                                        <p>Terdapat <span>5</span> orang mengantri</p>
                                        <button type="button" class="tombol-tutup-loket" class="btn">Open Loket</button>
                                    </div>
                                    <i class="bi bi-arrow-right-circle-fill" id="right-arrow"></i>
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
