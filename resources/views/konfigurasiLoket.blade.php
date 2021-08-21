@extends('layouts/auto-update-layout')

@section('container')
    <p>Nomor Antrean Saat Ini:</p>
    <!-- handle nul values when there is no queue  -->
    <h1 id="nomorAntrean">{{ $antrean->nomor_antrean ?? '0' }}</h1>

    <input id="inputRiwayatAntreanId" type="text" value="{{ $antrean->id ?? null }}" hidden>
    <input id="inputLoketId" type="text" value="{{ $loket->id }}" hidden>
    <div class="spinner-border" role="status" id="spinner" style="display:none;">
        <span class="visually-hidden">Loading...</span>
    </div>
    <h2><span id="jumlahPenunggu">{{ $jumlah_antrean_di_belakang ?? 0 }}</span> Orang Sedang Menunggu</h2>
    <button type="button" class="btn btn-primary" id="panggilAntrean">Panggil Antrean Berikutnya</button>
    <button type="button" class="btn btn-primary" id="tambahAntreanOffline">Masukkan Antrean</button>

    <div class="modal" tabindex="-1" id="modalKonfirmasiAntrean">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Majukan Antrean</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyKonfirmasiAntrean">
                    <form method="POST" id="formKonfirmasiAntrean">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" hidden>ID Riwayat Antrean</label>
                            <input type="text" class="form-control" id="idRiwayatAntrean111" name="idRiwayatAntrean" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" hidden>ID Loket</label>
                            <input type="text" class="form-control" id="idLoket" name="idLoket" hidden>
                        </div>
                        <div class="mb-3">
                            <p>Apakah anda yakin untuk memajukan antrean?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="modalAntreanOffline">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Antrean</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalAntreanOfflineBody">
                    <form method="POST" id="formAntreanOffline">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" hidden>ID Loket</label>
                            <input type="text" class="form-control" id="idLoketOffline" name="idLoketOffline" hidden>
                        </div>
                        <div class="mb-3">
                            <p>Apakah anda yakin untuk menambahkan antrean offline?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
