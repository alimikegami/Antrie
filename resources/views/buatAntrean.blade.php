@extends('layouts/main')

@section('container')
    <form action="{{ route('buat-record-antrean') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="namaAntrean" class="form-label">Nama Institusi/Event</label>
          <input type="text" class="form-control" id="namaAntrean" name="namaAntrean" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="kategoriAntrean" class="form-label">Kategori Antrean</label>
            <select name="kategoriAntrean" id="kategoriAntrean">
                @foreach ($kategori as $temp)
                    <option value="{{ $temp->id }}">{{ $temp->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
          <label for="deskripsiAntrean" class="form-label">Detail Antrean</label><br>
          <textarea id="deskripsiAntrean" name="deskripsiAntrean" rows="4" cols="50" required></textarea>
        </div>
        <div class="mb-3">
            <label for="attachmentAntrean" class="form-label">Attachment Antrean</label>
            <input type="file" id="attachmentAntrean" name="attachmentAntrean[]" multiple>
        </div>
        <div class="mb-3">
            <label for="gambarAntrean" class="form-label">Gambar Antrean</label>
            <input type="file" id="gambarAntrean" name="gambarAntrean">
        </div>
        <div class="mb-3">
            <label for="provinsiAntrean" class="form-label">Provinsi</label>
            <select name="provinsiAntrean" id="provinsiAntrean">
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
        <div class="mb-3">
            <label for="alamatAntrean" class="form-label">Alamat</label>
            <input type="text" id="alamatAntrean" name="alamatAntrean" required>
        </div>
        <div class="mb-3">
            <label for="jamBuka" class="form-label">Jam Operasional</label>
            <input type="time" id="jamBuka" name="jamBuka" required>
            <input type="time" id="jamTutup" name="jamTutup" required>
        </div>
        <div class="mb-3">
            <label for="teleponAntrean" class="form-label">Nomor Telepon</label>
            <input type="text" id="teleponAntrean" name="teleponAntrean" required>
        </div>
        <div class="mb-3">
            <label for="loket1" class="form-label">Nama Loket</label>
            <input type="text" id="loket1" name="loket1" required>
        </div>
        <div class="mb-3">
            <label for="kapasitasLoket1" class="form-label">Kapasitas Maksimum</label>
            <input type="number" id="kapasitasLoket1" name="kapasitasLoket1">
        </div>
        <div class="mb-3">
            <label for="jamBukaLoket1" class="form-label">Jam Operasional</label>
            <input type="time" id="jamBukaLoket1" name="jamBukaLoket1">
            <input type="time" id="jamTutupLoket1" name="jamTutupLoket1">
        </div>
        <div class="mb-3">
            <label for="loket2" class="form-label">Nama Loket</label>
            <input type="text" id="loket2" name="loket2">
        </div>
        <div class="mb-3">
            <label for="kapasitasLoket2" class="form-label">Kapasitas Maksimum</label>
            <input type="text" id="kapasitasLoket2" name="kapasitasLoket2">
        </div>
        <div class="mb-3">
            <label for="jamBukaLoket2" class="form-label">Jam Operasional</label>
            <input type="time" id="jamBukaLoket2" name="jamBukaLoket2">
            <input type="time" id="jamTutupLoket2" name="jamTutupLoket2">
        </div>
        <div class="mb-3">
            <label for="loket3" class="form-label">Nama Loket</label>
            <input type="text" id="loket3" name="loket3">
        </div>
        <div class="mb-3">
            <label for="kapasitasLoket3" class="form-label">Kapasitas Maksimum</label>
            <input type="text" id="kapasitasLoket3" name="kapasitasLoket3">
        </div>
        <div class="mb-3">
            <label for="jamBukaLoket3" class="form-label">Jam Operasional</label>
            <input type="time" id="jamBukaLoket3" name="jamBukaLoket3">
            <input type="time" id="jamTutupLoket3" name="jamTutupLoket3">
        </div>
        <div class="mb-3">
            <label for="loket4" class="form-label">Nama Loket</label>
            <input type="text" id="loket4" name="loket4">
        </div>
        <div class="mb-3">
            <label for="kapasitasLoket4" class="form-label">Kapasitas Maksimum</label>
            <input type="text" id="kapasitasLoket4" name="kapasitasLoket4">
        </div>
        <div class="mb-3">
            <label for="jamBukaLoket4" class="form-label">Jam Operasional</label>
            <input type="time" id="jamBukaLoket4" name="jamBukaLoket4">
            <input type="time" id="jamTutupLoket4" name="jamTutupLoket4">
        </div>
        <div class="mb-3">
            <label for="loket5" class="form-label">Nama Loket</label>
            <input type="text" id="loket5" name="loket5">
        </div>
        <div class="mb-3">
            <label for="kapasitasLoket5" class="form-label">Kapasitas Maksimum</label>
            <input type="text" id="kapasitasLoket5" name="kapasitasLoket5">
        </div>
        <div class="mb-3">
            <label for="jamBukaLoket5" class="form-label">Jam Operasional</label>
            <input type="time" id="jamBukaLoket5" name="jamBukaLoket5">
            <input type="time" id="jamTutupLoket5" name="jamTutupLoket5">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
@endsection