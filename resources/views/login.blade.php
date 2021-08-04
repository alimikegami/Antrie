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
    <h1>Login</h1>
    <form action="{{ route('signin') }}" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="emailLogin" class="form-label">Alamat Email</label>
          <input type="email" class="form-control" id="emailLogin" name="emailLogin" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="pwdLogin" class="form-label">Password</label>
          <input type="password" class="form-control" id="pwdLogin" name="pwdLogin">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
@endsection