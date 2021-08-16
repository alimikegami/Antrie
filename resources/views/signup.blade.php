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
    <div class="login-page d-flex justify-content-center align-items-center">
        <div class="login-content-container d-flex justify-content-center align-items-center">
            <div class="login-content d-flex justify-content-around align-items-center">
                <div class="login-first-column d-flex flex-column justify-content-center align-items-center">
                    <h1>Selamat datang.</h1>
                    <img src="img/gambarLogin.png" alt="login-gambar" class="img-fluid">
                </div>
                <div class="login-second-column d-flex flex-column justify-content-around align-items-center">
                    <a href="/"><img src="img/logoAntriedark.png" alt="logo-antrie-dark" class="img-fluid"></a>
                    <h3>Sign up</h3>
                    <form action="{{ route('store') }}" method="POST" class="d-flex flex-column">
                        {{ csrf_field() }}
                        <div class="input-nama">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="inputNama" name="inputNama">
                        </div>
                        <div class="input-email mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                        </div>
                        <div class="input-password mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                        </div>
                        <div class="input-password mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="inputKonfirmasiPassword"
                                name="inputKonfirmasiPassword">
                        </div>
                        <button type="submit" id="tombol-buat-dashboard">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
