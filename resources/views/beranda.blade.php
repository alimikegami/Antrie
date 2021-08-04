@extends('layouts/main')


@section('container')
    <p>Hello {{ session()->get('nama') }}</p>
    <a href="{{ route('buat-antrean') }}">Buat antrean</a>
    <br>
    <hr>
    
@endsection