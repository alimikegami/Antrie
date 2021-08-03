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
            <input type="text" id="kategoriAntrean" name="kategoriAntrean" required>
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
                <option value="Bali">Bali</option>
                <option value="Yogyakarta">Yogyakarta</option>
                <option value="Surabaya">Surabaya</option>
                <option value="Bandung">Bandung</option>
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
            <input type="text" id="teleponAntrean" name="teleponAntrean">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
@endsection