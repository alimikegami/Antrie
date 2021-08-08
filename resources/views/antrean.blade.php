@extends('layouts/main')


@section('container')
    @if ($antrean->nama_antrean)
        <h1>{{ $antrean->nama_antrean }}</h1>
    @else
        <h1>Tidak ada antrean berikutnya</h1>
    @endif
    
    <hr>
    @foreach ($antrean->loket as $temp)
        <h2>{{ $temp->nama_loket }}</h2>
        <p>Waktu Buka: {{ $temp->waktu_buka }}</p>
        <p>Waktu Tutup: {{ $temp->waktu_tutup }}</p>
        @if ($temp->status == "open")
            <a type="button" class="btn btn-primary" href="/konfirmasi-antrean/{{ $antrean->slug }}/loket/{{ $temp->slug }}/ambil-nomor">
                Ambil Antrean
            </a>
        @endif
    @endforeach
    
@endsection