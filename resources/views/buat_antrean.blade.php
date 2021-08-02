@extends('layouts/main')

@section('container')
    <form action="{{ route('buat-record-antrean') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="namaAntrean" class="form-label">Nama Institusi/Event</label>
          <input type="email" class="form-control" id="namaAntrean" name="namaAntrean" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="kategoriAntrean" class="form-label">Kategori Antrean</label>
            <input type="text" id="kategoriAntrean" name="kategoriAntrean">
        </div>
        <div class="mb-3">
          <label for="deskripsiAntrean" class="form-label">Detail Antrean</label><br>
          <textarea id="deskripsiAntrean" name="deskripsiAntrean" rows="4" cols="50"></textarea>
        </div>
        <div class="mb-3">
            <label for="attachmentAntrean" class="form-label">Attachment Antrean</label>
            <input type="file" id="attachmentAntrean" name="attachmentAntrean[]" multiple>
        </div>
        <div class="mb-3">
            <label for="gambarAntrean" class="form-label">Gambar Antrean</label>
            <input type="file" id="gambarAntrean" name="gambarAntrean" multiple>
        </div>
        <div class="mb-3">
            {{-- <label for="attachmentAntrean" class="form-label">Provinsi</label>
            <input type="file" id="attachmentAntrean" name="attachmentAntrean" multiple> --}}
        </div>
        <div class="mb-3">
            <label for="alamatAntrean" class="form-label">Alamat</label>
            <input type="text" id="alamatAntrean" name="alamatAntrean">
        </div>
        <div class="mb-3">
            <label for="jamBuka" class="form-label">Jam Operasional</label>
            <input type="time" id="jamBuka" name="jamBuka">
            <input type="time" id="jamTutup" name="jamTutup">
        </div>
        <div class="mb-3">
            <label for="alamatAntrean" class="form-label">Nomor Telepon</label>
            <input type="text" id="alamatAntrean" name="alamatAntrean">
        </div>
        <div class="mb-3">
            <label for="alamatAntrean" class="form-label">Nomor Telepon </label>
            <input type="text" id="alamatAntrean" name="alamatAntrean">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
@endsection