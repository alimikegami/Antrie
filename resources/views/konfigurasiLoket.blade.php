@extends('layouts/main')

@section('container')
    <p>Nomor Antrean Saat Ini:</p>
    <!-- handle nul values when there is no queue  -->
    <h1>{{ $antrean->nomor_antrean }}</h1>
    <a href="#" type="button" class="btn btn-primary" onclick="updateAntrean('{{ $antrean->id }}')" id="panggilAntrean">Panggil Antrean Berikutnya</a>

    <div class="modal" tabindex="-1" id="modalKonfirmasiAntrean">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Majukan Antrean</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formKonfirmasiAntrean">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Antrean Saat Ini</label>
                        <input type="text" class="form-control" id="idRiwayatAntrean">
                    </div>
                    <div class="mb-3">
                        <p>Apakah anda yakin untuk memajukan antrea?</p>
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

    <script>
        
    </script>
@endsection