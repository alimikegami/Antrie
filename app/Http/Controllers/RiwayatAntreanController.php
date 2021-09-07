<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatAntrean;
use Illuminate\Support\Facades\Auth;

class RiwayatAntreanController extends Controller
{
    public function show() {
        $history = RiwayatAntrean::with('loket')
                                    ->where('pengguna_id', '=', Auth::id())
                                    ->first();
        // jika batch di riwayat antrean sama dengan loket, tampilkan nomornya
        // Jika tidak, maka nomor tidak perlu ditampilkan
        return view('riwayatAntrean', ['riwayat'=> $history]);
    }
}
