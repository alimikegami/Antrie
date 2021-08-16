@extends('layouts/main')

@section('container')
    <div class="login-page d-flex justify-content-center align-items-center">
        <div class="login-content-container d-flex justify-content-center align-items-center">
            <div class="login-content d-flex justify-content-around align-items-center">
                <div class="login-first-column d-flex flex-column justify-content-center align-items-center">
                    <h1>Selamat datang.</h1>
                    <img src="img/gambarLogin.png" alt="login-gambar" class="img-fluid">
                </div>
                <div class="login-second-column d-flex flex-column justify-content-around align-items-center">
                    <img src="img/logoAntriedark.png" alt="logo-antrie-dark" class="img-fluid">
                    <h3>Set New Password</h3>
                    <form action="{{ route('updatePassword') }}" method="POST" class="d-flex flex-column">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="input-new-password">
                            <label for="newPasswordReset" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPasswordReset" name="newPasswordReset">
                        </div>
                        <div class="input-confirm-password">
                            <label for="confirmPasswordReset" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPasswordReset" name="confirmPasswordReset">
                        </div>
                        <button type="submit" id="tombol-buat-dashboard">Confirm</button>
                    </form>
                    <div class="d-flex flex-column align-items-center">
                        <small><a href="#">Forgot password?</a></small>

                        <p class="mt-3">Belum punya akun?<a href="{{ route('signup') }}">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
