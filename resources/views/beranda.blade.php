@extends('layouts/main')


@section('container')
    <p>Hello {{ session()->get('nama') }}</p>
    <a href="{{ route('buat-antrean') }}">Buat antrean</a>
    <br> <br> <br>
    
    <h3>Antrean:</h3>
    <hr>
    @foreach ($antrean as $temp)
        <a href="/antrean/{{ $temp->slug }}"><h4>{{ $temp->nama_antrean }}</h4></a>
        <p>By: {{ $temp->pengguna->nama }}</p>
        <hr>
    @endforeach
@endsection