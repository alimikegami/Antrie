@extends('layouts/main')

@section('container')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('components/sidebar')
            <div class="col py-3">
                <div class="dashboard-content d-flex flex-column">
                    <div class="field-form-tambah-antrian d-flex justify-content-center">
                        <form class="form-tambah-antrian d-flex flex-column flex-fill px-xl-5"
                            action="{{ route('buat-record-antrean') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="field-informasi-lokasi-antrian">
                                <h1>Informasi lokasi antrean</h1>
                                <p>Tolong isi form berikut dengan memberikan informasi mengenai antrean yang ingin anda
                                    buat.</p>
                                <div class="mb-3 row mt-4">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Nama institusi/event
                                        <span>*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="namaAntrean" name="namaAntrean"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Kategori Antrean
                                        <span>*</span></label>
                                    <div class="col-sm-5">
                                        <select class="form-select" aria-label="Default select example"
                                            name="kategoriAntrean" id="kategoriAntrean" required>
                                            <option selected disabled value="">Pilih kategori...</option>
                                            @foreach ($kategori as $temp)
                                                <option value="{{ $temp->id }}">{{ $temp->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Provinsi
                                        <span>*</span></label>
                                    <div class="col-sm-5">
                                        <select name="provinsiAntrean" id="provinsiAntrean" class="form-select" required>
                                            <option selected disabled value="">Pilih provinsi...</option>
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
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Alamat <span>*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="alamatAntrean" name="alamatAntrean"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">No telepon
                                        <span>*</span></label>
                                    <div class="col-sm-7 col-10">
                                        <input type="number" class="form-control" id="teleponAntrean"
                                            name="teleponAntrean" required>
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
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Jam Operasional
                                        <span>*</span></label>
                                    <div class="col-sm-7 col-10">
                                        <label for="">Buka</label>
                                        <input type="time" id="jamBuka" name="jamBuka" required>
                                        <label for="">Tutup</label>
                                        <input type="time" id="jamTutup" name="jamTutup" required>
                                    </div>
                                    <div class="col-sm-1 col-1">
                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="hover focus"
                                            data-bs-content="Jam operasional dari antrian yang akan anda buat.">
                                            <i class="bi bi-question-circle" style="color: #2F2D65;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Deskripsi
                                        <span>*</span></label>
                                    <div class="col-sm-7 col-10">
                                        <textarea class="form-control" id="deskripsiAntrean" name="deskripsiAntrean"
                                            rows="3" required></textarea>
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
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Attactment antrean <span
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
                                        <div class="col-sm-7 col-10">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket1" name="jamBukaLoket1" required>
                                            <label for="">Tutup</label>
                                            <input type="time" id="jamTutupLoket1" name="jamTutupLoket1" required>
                                        </div>
                                        <div class="col-sm-1 col-1">
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
                                        <div class="col-sm-7 col-10">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket2" name="jamBukaLoket2">
                                            <label for="">Tutup</label>
                                            <input type="time" id="jamTutupLoket2" name="jamTutupLoket2">
                                        </div>
                                        <div class="col-sm-1 col-1">
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
                                        <div class="col-sm-7 col-10">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket3" name="jamBukaLoket3">
                                            <label for="">Tutup</label>
                                            <input type="time" id="jamTutupLoket3" name="jamTutupLoket3">
                                        </div>
                                        <div class="col-sm-1 col-1">
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
                                        <div class="col-sm-7 col-10">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket4" name="jamBukaLoket4">
                                            <label for="">Tutup</label>
                                            <input type="time" id="jamTutupLoket4" name="jamTutupLoket4">
                                        </div>
                                        <div class="col-sm-1 col-1">
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
                                        <div class="col-sm-7 col-10">
                                            <label for="">Buka</label>
                                            <input type="time" id="jamBukaLoket5" name="jamBukaLoket5">
                                            <label for="">Tutup</label>
                                            <input type="time" id="jamTutupLoket5" name="jamTutupLoket5">
                                        </div>
                                        <div class="col-sm-1 col-1">
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
                            <button type="submit" class="align-self-center mt-5 tombol-submit-form-buat-loket">Buat
                                antrian</button>
                        </form>
                    </div>
                </div>
                @include('components/footer')
            </div>
        </div>
    </div>
@endsection
