@extends('layouts/main')

@section('container')
    <div class="login-page d-flex justify-content-center align-items-center">
        <div class="login-content-container d-flex justify-content-center align-items-center">
            <div class="login-content d-flex justify-content-around align-items-center">
                <div class="login-first-column d-flex flex-column justify-content-center align-items-center">
                    <h1>Selamat datang.</h1>
                    <img src="img/gambarLogin.png" alt="login-gambar" class="img-fluid">
                </div>
                <div class="login-second-column d-flex flex-column justify-content-end align-items-center">
                    <img src="img/logoAntriedark.png" alt="logo-antrie-dark" class="img-fluid mb-5">
                    <h3>Reset password</h3>
                    <form action="/send-password-reset-link" method="POST"
                        class="d-flex flex-column align-items-center mt-3">
                        @csrf
                        <div class="input-email-forgot-password mb-5">
                            <label for="emailResetPassword" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailResetPassword" name="emailResetPassword">
                        </div>
                        <button type="submit" id="tombol-reset-password">Send Password Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
