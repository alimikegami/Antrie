@extends('layouts/main')

@section('container')
    <h1>{{ session('ID_pengguna') }}</h1>
    @foreach ($antrean as $temp)
        <hr>
            <a href=""><h3>{{ $temp->nama_antrean }}</h3></a>
            @foreach ($temp->loket as $item)
                <h4>{{ $item->nama_loket }}</h4>
                @if ($item->status == "closed")
                    <a href="/buka-loket/{{ $item->id }}" class="btn btn-primary" type="button">Open Loket</a>
                @else
                    <a href="/tutup-loket/{{ $item->id }}" class="btn btn-primary" type="button">Close Loket</a>
                    <a href="/antreanku/antrean/{{ $temp->slug }}/loket/{{ $item->slug }}" class="btn btn-primary" type="button">{{ $item->slug }}</a>
                @endif
            @endforeach
        <hr>
    @endforeach
@endsection