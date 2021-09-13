<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatAntrean;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RiwayatAntreanController extends Controller
{
    public function show()
    {
        $history = RiwayatAntrean::with(['loket', 'antrean'])
            ->where('pengguna_id', '=', Auth::id())
            ->where('status', '!=', 'canceled')
            ->orderBy('id', 'desc')
            ->get();
        $latest_queue_number = [];
        $antrean_di_depan = [];
        $estimasi_waktu_tunggu = [];
        $waktu_fix = [];
        foreach ($history as $temp) {
            $latest_queue_number[] = RiwayatAntrean::where('loket_id', '=', $temp->loket->id)
                ->where('status', '=', "serving")
                ->where('batch', '=', $temp->loket->batch)
                ->get();
            $antrean_di_depan_temp = RiwayatAntrean::where('loket_id', '=', $temp->loket->id)
                ->where('status', '=', 'waiting')
                ->where('batch', '=', $temp->loket->batch)
                ->count();
            $antrean_di_depan[] = $antrean_di_depan_temp;
            $estimasi_waktu_tunggu_temp = DB::select(DB::raw("SELECT AVG(TIME_TO_SEC(TIMEDIFF(ra_1.dipanggil, ra_2.dipanggil))) AS estimasi_waktu_tunggu 
                                                                                FROM riwayat_antrean AS ra_1 INNER JOIN riwayat_antrean AS ra_2 ON ra_1.id = ra_2.id + 1 
                                                                                WHERE ra_1.loket_id = :id_loket AND ra_1.batch = :batch_1 AND ra_2.batch = :batch_2"), ['id_loket' => $temp->loket->id, 'batch_1' => $temp->loket->batch, 'batch_2' => $temp->loket->batch]);
            $estimasi_waktu_tunggu = $estimasi_waktu_tunggu_temp;
            $waktu_fix[] = round(($estimasi_waktu_tunggu[0]->estimasi_waktu_tunggu * $antrean_di_depan_temp) / 60);
        }
        // jika batch di riwayat antrean sama dengan loket, tampilkan nomornya
        // Jika tidak, maka nomor tidak perlu ditampilkan
        return view('riwayatAntrean', ['riwayat' => $history, 'title' => 'Riwayat Antrean', 'latest_queue_number' => $latest_queue_number, 'waktu_fix' => $waktu_fix]);
    }

    public function batalkanAntrean(Request $request) {
        $riwayat = RiwayatAntrean::where('id', '=', $request->id_riwayat)->first();
        if(!is_null($riwayat)) {
            $riwayat->status = 'canceled';
            $riwayat->save();
        }

        return back()->withInput();
    }
}
