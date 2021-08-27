<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;
use App\Models\RiwayatAntrean;
use Illuminate\Support\Facades\Auth;

class AntreankuController extends Controller
{
    public function showAntreanku(){
        if (Auth::check()) {
            return view('antreanku', [
                'title' => "Antreanku",
                'antrean' => Antrean::with('kategori')->where('id_pembuat', '=', Auth::id())->get(),
            ]);
        } else {
            return redirect()->route('landingpage');
        }
    }
    
    public function aturLoket(Antrean $antrean){
        $antrean = Antrean::with('loket')
                            ->where('id', '=', $antrean->id)
                            ->first();

        $antrean_di_belakang = [];

        foreach ($antrean->loket as $loket) {
            $antrean_di_belakang[] = (RiwayatAntrean::where('loket_id', '=', $loket->id)
                                                        ->where('status', '=', 'waiting')
                                                        ->where('batch', '=', $loket->batch)
                                                        ->count());
        }

        return view('aturLoket', [
                    'antrean' => $antrean,
                    'title' => $antrean->nama_antrean,
                    'antrean_di_belakang' => $antrean_di_belakang
        ]);
    }
}
