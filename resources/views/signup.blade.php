@extends('layouts/main')

@section('container')
    <div class="login-page d-flex justify-content-center align-items-center flex-column">
        @if (session('alert-success'))
            <div class="alert alert-success align-self-center alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                    aria-label="Warning:">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                {{ session('alert-success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('alert-danger'))
            <div class="alert alert-danger align-self-center alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                    aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                {{ session('alert-danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="login-content-container d-flex justify-content-center align-items-center">
            <div class="login-content d-flex justify-content-around align-items-center">
                <div class="login-first-column d-flex flex-column justify-content-center align-items-center">
                    <h1>Selamat datang.</h1>
                    <div>
                        <img src="img/gambarLogin.png" alt="login-gambar" class="img-fluid">
                    </div>
                </div>
                <div class="login-second-column d-flex flex-column justify-content-center align-items-center">
                    <a href="/" class="signup-logo"><img src="img/logoAntriedark.png" alt="logo-antrie-dark" class="img-fluid"></a>
                    <h3>Sign up</h3>
                    <form action="{{ route('store') }}" method="POST" class="d-flex flex-column align-items-center">
                        {{ csrf_field() }}
                        <div class="input-nama">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    Tolong masukkan nama yang valid!
                                </div>
                            @enderror
                        </div>

                        <div class="input-email mt-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-password mt-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-password mt-2">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation">
                        </div>
                        <button type="submit" id="tombol-login" class="mt-3">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
