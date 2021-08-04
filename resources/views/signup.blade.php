@extends('layouts/main')

@if (session('alert-success'))
  <div class="alert alert-success" role="alert">
    {{ session('alert-success') }}
  </div>
@endif

@if (session('alert-danger'))
  <div class="alert alert-danger" role="alert">
    {{ session('alert-danger') }}
  </div>
@endif

@section('container')
    <form action="{{ route('store') }}" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" name = "inputNama" aria-describedby="emailHelp">
          </div>
        <div class="mb-3">
          <label for="inputEmail" class="form-label">Alamat Email</label>
          <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="inputPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="inputPassword">
        </div>
        <div class="mb-3">
            <label for="inputKonfirmasiPassword" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="inputKonfirmasiPassword" name="inputKonfirmasiPassword">
          </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
@endsection