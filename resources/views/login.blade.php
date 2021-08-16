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
                    <img src="img/gambarLogin.png" alt="login-gambar" class="img-fluid">
                </div>
                <div class="login-second-column d-flex flex-column justify-content-around align-items-center">
                    <a href="/"><img src="img/logoAntriedark.png" alt="logo-antrie-dark" class="img-fluid"></a>
                    <h3>Sign in</h3>
                    <form action="{{ route('signin') }}" method="POST" class="d-flex flex-column">
                        {{ csrf_field() }}
                        <div class="input-email">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailLogin" name="emailLogin">
                        </div>
                        <div class="input-password mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pwdLogin" placeholder="" name="pwdLogin">
                        </div>
                        <button type="submit" id="tombol-buat-dashboard">Sign in</button>
                    </form>
                    <div class="d-flex flex-column align-items-center">
                        <small><a href="{{ route('forgotPassword') }}">Forgot password?</a></small>

                        <p class="mt-3">Belum punya akun?<a href="{{ route('signup') }}">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
