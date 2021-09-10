@extends('layouts/main')

@section('container')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="dashboard-container col-auto col-md-12 py-3 col-lg-10 mt-5 mt-md-0">
                <div class="dashboard-content d-flex flex-column">
                    <div class="field-form-tambah-antrian d-flex justify-content-center">
                        <form class="form-tambah-antrian d-flex flex-column flex-fill px-xl-5" action="/perbaharui-antrean"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="field-informasi-lokasi-antrian">
                                <h1>Informasi lokasi antrean</h1>
                                <p>Tolong isi form berikut dengan memberikan informasi mengenai antrean yang ingin anda
                                    buat.</p>
                                <input type="text" class="form-control" id="id_antrean" name="id_antrean" required
                                    value="{{ $antrean[0]->id }}" hidden readonly>
                                <div class="mb-3 row mt-4">
                                    <label for="namaAntrean" class="col-sm-4 col-form-label">Nama institusi/event
                                        <span>*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="namaAntrean" name="namaAntrean"
                                            required value="{{ $antrean[0]->nama_antrean }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kategoriAntrean" class="col-sm-4 col-form-label">Kategori Antrean
                                        <span>*</span></label>
                                    <div class="col-sm-5">
                                        <select class="form-select" aria-label="Default select example"
                                            name="kategoriAntrean" id="kategoriAntrean" required>
                                            <option selected disabled value="">Pilih kategori...</option>
                                            @foreach ($kategori as $temp)
                                                <option value="{{ $temp->id }}" @if ($antrean[0]->id_kategori == $temp->id)
                                                    selected
                                            @endif>{{ $temp->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="provinsiAntrean" class="col-sm-4 col-form-label">Provinsi
                                        <span>*</span></label>
                                    <div class="col-sm-5">
                                        <select name="provinsiAntrean" id="provinsiAntrean" class="form-select" required>
                                            <option selected disabled value="">Pilih provinsi...</option>
                                            <option value="DKI JAKARTA" @if ($antrean[0]->provinsi == 'DKI JAKARTA')
                                                selected
                                                @endif>DKI Jakarta</option>
                                            <option value="JAWA BARAT" @if ($antrean[0]->provinsi == 'JAWA BARAT')
                                                selected
                                                @endif>Jawa Barat</option>
                                            <option value="JAWA TENGAH" @if ($antrean[0]->provinsi == 'JAWA TENGAH')
                                                selected
                                                @endif>Jawa Tengah</option>
                                            <option value="JAWA TIMUR" @if ($antrean[0]->provinsi == 'JAWA TIMUR')
                                                selected
                                                @endif>Jawa Timur</option>
                                            <option value="KALIMANTAN TIMUR" @if ($antrean[0]->provinsi == 'KALIMANTAN TIMUR')
                                                selected
                                                @endif>Kalimantan Timur</option>
                                            <option value="DAERAH ISTIMEWA YOGYAKARTA" @if ($antrean[0]->provinsi == 'DAERAH ISTIMEWA YOGYAKARTA')
                                                selected
                                                @endif>Daerah Istimewa Yogyakarta</option>
                                            <option value="BANTEN" @if ($antrean[0]->provinsi == 'BANTEN')
                                                selected
                                                @endif>Banten</option>
                                            <option value="RIAU" @if ($antrean[0]->provinsi == 'RIAU')
                                                selected
                                                @endif>Riau</option>
                                            <option value="SULAWESI SELATAN" @if ($antrean[0]->provinsi == 'SULAWESI SELATAN')
                                                selected
                                                @endif>Sulawesi Selatan</option>
                                            <option value="BALI" @if ($antrean[0]->provinsi == 'BALI')
                                                selected
                                                @endif>Bali</option>
                                            <option value="SUMATERA BARAT" @if ($antrean[0]->provinsi == 'SUMATERA BARAT')
                                                selected
                                                @endif>Sumatera Barat</option>
                                            <option value="SUMATERA UTARA" @if ($antrean[0]->provinsi == 'SUMATERA UTARA')
                                                selected
                                                @endif>Sumatera Utara</option>
                                            <option value="KALIMANTAN SELATAN" @if ($antrean[0]->provinsi == 'KALIMANTAN SELATAN')
                                                selected
                                                @endif>Kalimantan Selatan</option>
                                            <option value="SUMATERA SELATAN" @if ($antrean[0]->provinsi == 'SUMATERA SELATAN')
                                                selected
                                                @endif>Sumatera Selatan</option>
                                            <option value="NUSA TENGGARA TIMUR" @if ($antrean[0]->provinsi == 'NUSA TENGGARA TIMUR')
                                                selected
                                                @endif>Nusa Tenggara Timur</option>
                                            <option value="KEPULAUAN RIAU" @if ($antrean[0]->provinsi == 'KEPULAUAN RIAU')
                                                selected
                                                @endif>Kepulauan Riau</option>
                                            <option value="LAMPUNG" @if ($antrean[0]->provinsi == 'LAMPUNG')
                                                selected
                                                @endif>Lampung</option>
                                            <option value="KEPULAUAN BANGKA BELITUNG" @if ($antrean[0]->provinsi == 'KEPULAUAN BANGKA BELITUNG')
                                                selected
                                                @endif>Kepulauan Bangka Belitung</option>
                                            <option value="KALIMANTAN TENGAH" @if ($antrean[0]->provinsi == 'KALIMANTAN TENGAH')
                                                selected
                                                @endif>Kalimantan Tengah</option>
                                            <option value="SULAWESI TENGAH" @if ($antrean[0]->provinsi == 'SULAWESI TENGAH')
                                                selected
                                                @endif>Sulawesi Tengah</option>
                                            <option value="KALIMANTAN BARAT" @if ($antrean[0]->provinsi == 'KALIMANTAN BARAT')
                                                selected
                                                @endif>Kalimantan Barat</option>
                                            <option value="PAPUA" @if ($antrean[0]->provinsi == 'PAPUA')
                                                selected
                                                @endif>Papua</option>
                                            <option value="SULAWESI UTARA" @if ($antrean[0]->provinsi == 'SULAWESI UTARA')
                                                selected
                                                @endif>Sulawesi Utara</option>
                                            <option value="KALIMANTAN UTARA" @if ($antrean[0]->provinsi == 'KALIMANTAN UTARA')
                                                selected
                                                @endif>Kalimantan Utara</option>
                                            <option value="PAPUA" @if ($antrean[0]->provinsi == 'PAPUA')
                                                selected
                                                @endif>Papua</option>
                                            <option value="JAMBI" @if ($antrean[0]->provinsi == 'JAMBI')
                                                selected
                                                @endif>Jambi</option>
                                            <option value="NUSA TENGGARA BARAT" @if ($antrean[0]->provinsi == 'NUSA TENGGARA BARAT')
                                                selected
                                                @endif>Nusa Tenggara Barat</option>
                                            <option value="PAPUA BARAT" @if ($antrean[0]->provinsi == 'PAPUA BARAT')
                                                selected
                                                @endif>Papua Barat</option>
                                            <option value="BENGKULU" @if ($antrean[0]->provinsi == 'BENGKULU')
                                                selected
                                                @endif>Bengkulu</option>
                                            <option value="SULAWESI TENGGARA" @if ($antrean[0]->provinsi == 'SULAWESI TENGGARA')
                                                selected
                                                @endif>Sulawesi Tenggara</option>
                                            <option value="MALUKU" @if ($antrean[0]->provinsi == 'MALUKU')
                                                selected
                                                @endif>Maluku</option>
                                            <option value="MALUKU UTARA" @if ($antrean[0]->provinsi == 'MALUKU UTARA')
                                                selected
                                                @endif>Maluku Utara</option>
                                            <option value="SULAWESI BARAT" @if ($antrean[0]->provinsi == 'SULAWESI BARAT')
                                                selected
                                                @endif>Sulawesi Barat</option>
                                            <option value="GORONTALO" @if ($antrean[0]->provinsi == 'GORONTALO')
                                                selected
                                                @endif>Gorontalo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamatAntrean" class="col-sm-4 col-form-label">Alamat <span>*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="alamatAntrean" name="alamatAntrean"
                                            required value="{{ $antrean[0]->alamat }}">
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="teleponAntrean" class="col-sm-4 col-form-label">No telepon
                                        <span>*</span></label>
                                    <div class="col-sm-7 col-10">
                                        <input type="number" class="form-control" id="teleponAntrean"
                                            name="teleponAntrean" required value="{{ $antrean[0]->nomor_telepon }}">
                                    </div>
                                    <div class="col-sm-1 col-1">
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="No telepon yang dapat dihubungi oleh pengantri.">
                                            <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="jamBuka" class="col-sm-4 col-form-label">Jam Operasional
                                        <span>*</span></label>
                                    <div class="col-sm-7 col-6">
                                        <label for="">Buka</label>
                                        <input type="time" id="jamBuka" name="jamBuka" required
                                            value="{{ $antrean[0]->waktu_buka }}">
                                        <label for="" class="mt-3 mt-sm-0 ms-sm-3">Tutup</label>
                                        <input type="time" id="jamTutup" name="jamTutup" required
                                            value="{{ $antrean[0]->waktu_tutup }}">
                                    </div>
                                    <div class="col-sm-1 col-6">
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="Jam operasional dari antrian yang akan anda buat.">
                                            <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="deskripsiAntrean" class="col-sm-4 col-form-label">Deskripsi
                                        <span>*</span></label>
                                    <div class="col-sm-7 col-10">
                                        <textarea class="form-control" id="deskripsiAntrean" name="deskripsiAntrean"
                                            rows="3" required>{{ $antrean[0]->deskripsi }}</textarea>
                                    </div>
                                    <div class="col-sm-1 col-1">
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="Deskripsikan mengenai antrian apa yang akan anda buat.">
                                            <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="field-file-tambahan mt-5">
                                <h1>File Tambahan</h1>
                                <div class="mb-3 row mt-4 align-items-center">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Attactment antrean<span
                                            class="opt-word">(optional)</span></label>
                                    <div class="col-sm-7 col-10">
                                        <input class="form-control" type="file" id="attachmentAntrean"
                                            name="attachmentAntrean[]" multiple>
                                    </div>
                                    <div class="col-sm-1 col-1">
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="Attactment dapat berupa file formulir pendaftaran ataupun file-file yang dibutuhkan oleh pengantri dalam antrian yang akan anda buat.">
                                            <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Gambar antrean <span
                                            class="opt-word">(optional)</span></label>
                                    <div class="col-sm-7 col-10">
                                        <input class="form-control" type="file" id="gambarAntrean" name="gambarAntrean">
                                    </div>
                                    <div class="col-sm-1 col-1">
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="Gambar antrean akan digunakan sebagai logo/thumbnail yang melambangkan antrean yang akan anda buat pada saat pengantri memilih antrian.">
                                            <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="field-informasi-loket mt-5 d-flex flex-column">
                                <h1>Informasi loket</h1>
                                <p>Jumlah maksimal loket yang dapat dibuat adalah 5 buah loket, dan minimal 1 buah loket
                                    harus dibuat.</p>
                                <div class="loket-satu" id="loket-satu">
                                    <h2># loket 1</h2>
                                    <div class="mb-3 row mt-4">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Nama loket
                                            <span>*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="loket1" name="loket1" required>
                                            <input type="text" class="form-control" id="idLoket1" name="idLoket1" hidden>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-4 align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Kapasitas maksimum
                                            <span>*</span></label>
                                        <div class="col-sm-7 col-10">
                                            <input type="number" class="form-control" id="kapasitasLoket1"
                                                name="kapasitasLoket1" required>
                                        </div>
                                        <div class="col-sm-1 col-1">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jumlah maksimal pengantri yang akan dilayani pada loket.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Jam Operasional
                                            <span>*</span></label>
                                        <div class="col-sm-7 col-6">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket1" name="jamBukaLoket1" required>
                                            <label for="" class="mt-3 mt-sm-0 ms-sm-3">Tutup</label>
                                            <input type="time" id="jamTutupLoket1" name="jamTutupLoket1" required>
                                        </div>
                                        <div class="col-sm-1 col-6">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jam operasional dari loket yang akan anda buat.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="loket-dua d-none" id="loket-dua">
                                    <hr class="rounded">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h2># loket 2</h2>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus" data-bs-content="Hapus loket">
                                            <button type="button" class="btn-close" id="btn-close-2"
                                                aria-label="Close"></button>
                                        </span>
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Nama loket</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="loket2" name="loket2">
                                            <input type="text" class="form-control" id="idLoket2" name="idLoket2" hidden>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-4 align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Kapasitas
                                            maksimum</label>
                                        <div class="col-sm-7 col-10">
                                            <input type="number" class="form-control" id="kapasitasLoket2"
                                                name="kapasitasLoket2">
                                        </div>
                                        <div class="col-sm-1 col-1">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jumlah maksimal pengantri yang akan dilayani pada loket.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Jam Operasional</label>
                                        <div class="col-sm-7 col-6">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket2" name="jamBukaLoket2">
                                            <label for="" class="mt-3 mt-sm-0 ms-sm-3">Tutup</label>
                                            <input type="time" id="jamTutupLoket2" name="jamTutupLoket2">
                                        </div>
                                        <div class="col-sm-1 col-6">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jam operasional dari loket yang akan anda buat.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="loket-tiga d-none" id="loket-tiga">
                                    <hr class="rounded">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h2># loket 3</h2>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus" data-bs-content="Hapus loket">
                                            <button type="button" class="btn-close" id="btn-close-3"
                                                aria-label="Close"></button>
                                        </span>
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Nama loket</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="loket3" name="loket3">
                                            <input type="text" class="form-control" id="idLoket3" name="idLoket3" hidden>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-4 align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Kapasitas
                                            maksimum</label>
                                        <div class="col-sm-7 col-10">
                                            <input type="number" class="form-control" id="kapasitasLoket3"
                                                name="kapasitasLoket3">
                                        </div>
                                        <div class="col-sm-1 col-1">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jumlah maksimal pengantri yang akan dilayani pada loket.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Jam Operasional</label>
                                        <div class="col-sm-7 col-6">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket3" name="jamBukaLoket3">
                                            <label for="" class="mt-3 mt-sm-0 ms-sm-3">Tutup</label>
                                            <input type="time" id="jamTutupLoket3" name="jamTutupLoket3">
                                        </div>
                                        <div class="col-sm-1 col-6">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jam operasional dari loket yang akan anda buat.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="loket-empat d-none" id="loket-empat">
                                    <hr class="rounded">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h2># loket 4</h2>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus" data-bs-content="Hapus loket">
                                            <button type="button" class="btn-close" id="btn-close-4"
                                                aria-label="Close"></button>
                                        </span>
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Nama loket</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="loket4" name="loket4">
                                            <input type="text" class="form-control" id="idLoket4" name="idLoket4" hidden>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-4 align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Kapasitas
                                            maksimum</label>
                                        <div class="col-sm-7 col-10">
                                            <input type="number" class="form-control" id="kapasitasLoket4"
                                                name="kapasitasLoket4">
                                        </div>
                                        <div class="col-sm-1 col-1">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jumlah maksimal pengantri yang akan dilayani pada loket.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Jam Operasional</label>
                                        <div class="col-sm-7 col-6">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket4" name="jamBukaLoket4">
                                            <label for="" class="mt-3 mt-sm-0 ms-sm-3">Tutup</label>
                                            <input type="time" id="jamTutupLoket4" name="jamTutupLoket4">
                                        </div>
                                        <div class="col-sm-1 col-6">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jam operasional dari loket yang akan anda buat.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="loket-lima d-none" id="loket-lima">
                                    <hr class="rounded">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h2># loket 5</h2>
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus" data-bs-content="Hapus loket">
                                            <button type="button" class="btn-close" id="btn-close-5"
                                                aria-label="Close"></button>
                                        </span>
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Nama loket</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="loket5" name="loket5">
                                            <input type="text" class="form-control" id="idLoket5" name="idLoket5" hidden>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-4 align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Kapasitas
                                            maksimum</label>
                                        <div class="col-sm-7 col-10">
                                            <input type="number" class="form-control" id="kapasitasLoket5"
                                                name="kapasitasLoket5">
                                        </div>
                                        <div class="col-sm-1 col-1">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jumlah maksimal pengantri yang akan dilayani pada loket.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Jam Operasional</label>
                                        <div class="col-sm-7 col-6">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket5" name="jamBukaLoket5">
                                            <label for="" class="mt-3 mt-sm-0 ms-sm-3">Tutup</label>
                                            <input type="time" id="jamTutupLoket5" name="jamTutupLoket5">
                                        </div>
                                        <div class="col-sm-1 col-6">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-content="Jam operasional dari loket yang akan anda buat.">
                                                <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <button type="button"
                                    class="btn btn-outline-primary align-self-center mt-4 rounded tambah-loket"><i
                                        class="bi bi-plus-lg"></i> tambah loket</button>
                            </div>
                            <button type="submit" class="align-self-center mt-5 tombol-submit-form-buat-loket">Perbaharui
                                Antrean</button>
                        </form>
                    </div>
                </div>
                @include('components/footer')
            </div>
        </div>
    </div>


    <script type="text/javascript">
        let loket = <?= json_encode($antrean[0]->loket) ?>;
        let i = 1;
        loket.forEach(element => {
            let nama = "loket" + i;
            let id = "idLoket" + i;
            let kapasitas = "kapasitasLoket" + i;
            let waktu_buka = "jamBukaLoket" + i;
            let waktu_tutup = "jamTutupLoket" + i;
            document.getElementById(nama).value = element.nama_loket;
            document.getElementById(id).value = element.id;
            document.getElementById(kapasitas).value = element.jumlah_pengantre_maks;
            document.getElementById(waktu_buka).value = element.waktu_buka;
            document.getElementById(waktu_tutup).value = element.waktu_tutup;
            i = i + 1;
        });
    </script>


@endsection
