@extends('layouts/main')


@section('container')
    <h1>{{ $antrean->nama_antrean }}</h1>
    <hr>
    @foreach ($antrean->loket as $temp)
        <h2>{{ $temp->nama_loket }}</h2>
        <p>Waktu Buka: {{ $temp->waktu_buka }}</p>
        <p>Waktu Tutup: {{ $temp->waktu_tutup }}</p>
        @if ($temp->status == "open")
            <a type="button" class="btn btn-primary" href="/konfirmasi-antrean/{{ $antrean->slug }}/loket/{{ $temp->slug }}">
                Ambil Antrean
            </a>
        @endif
    @endforeach
    
@endsection