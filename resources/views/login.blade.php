@extends('layouts/main')

@if (session('status'))
    @if (session('status') == 'account not found')
        <p>wrong email</p>
    @endif
    @if (session('status') == 'wrong email/password')
        <p>wrong pass</p>
    @endif
@endif

@section('container')
    <div class="login-page d-flex justify-content-center align-items-center">
        <div class="login-content-container d-flex justify-content-center align-items-center">
            <div class="login-content d-flex justify-content-around align-items-center">
                <div class="login-first-column d-flex flex-column justify-content-center align-items-center">
                    <h1>Selamat datang.</h1>
                    <div>
                        <img src="img/gambarLogin.png" alt="login-gambar" class="img-fluid">
                    </div>
                </div>
                <div class="login-second-column d-flex flex-column justify-content-center align-items-center">
                    <a href="/" class="login-logo"><img src="img/logoAntriedark.png" alt="logo-antrie-dark" class="img-fluid"></a>
                    <h3>Sign in</h3>
                    <form action="{{ route('authenticate') }}" method="POST" class="d-flex flex-column align-items-center">
                        {{ csrf_field() }}
                        <div class="input-email">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="input-password mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="" name="password">
                        </div>
                        <button type="submit" id="tombol-buat-dashboard" class="mt-4">Sign in</button>
                    </form>
                    <div class="d-flex flex-column align-items-center mt-3">
                        <p><a href="{{ route('forgotPassword') }}">Forgot password?</a></p>
                        <p>Belum punya akun? <a href="{{ route('signup') }}">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
