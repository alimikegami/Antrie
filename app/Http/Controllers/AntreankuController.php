<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Antrean;
use App\Models\Kategori;
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

    public function editAntrean(Antrean $antrean) {
        $antrean = Antrean::with('loket')
                            ->where('id', '=', $antrean->id)
                            ->get();
        return view('perbaharuiAntrean', [
                    'antrean' => $antrean, 
                    'title' => 'Perbaharui Antrean',
                    'kategori' => Kategori::all()
                ]);
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

    public function showKonfigurasiLoket($slug, Loket $loket)
    {
        // Cari nomor antrean pertama yang sedang dilayani
        $antrean = RiwayatAntrean::where('loket_id', '=', $loket->id)
            ->where('status', '=', 'serving')
            ->where('batch', '=', $loket->batch)
            ->orderBy('id', 'ASC')
            ->first();

        // Gimana cara bedain baru buka antrean dan tidak ada orang yang sedang menunggu untuk menampilkan tidak ada antrean?
        // mungkin waktu ambil antrean berikutnya jadi served??

        // Cari jumlah pengantre yang sedang menunggu
        $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $loket->id)
            ->where('status', '=', 'waiting')
            ->where('batch', '=', $loket->batch)
            ->count();

        // Jika tidak ada yang di-serve dan antrean di belakang kosong, 
        // periksa apakah antrean berikutnya adalah antrean pertama
        if (is_null($antrean) && $antrean_di_belakang == 0) {
            $next_person = RiwayatAntrean::where('loket_id', '=', $loket->id)
                            ->where('status', '=', 'waiting')
                            ->where('batch', '=', $loket->batch)
                            ->first();
            if(!(is_null($next_person)) && $next_person->nomor_antrean == 1) {
                // Jika belum ada nomor yang dipanggil, maka tampilkan nol
                $antrean = null;
            } else {
                // Jika sudah ada namun tidak ada nomor berikutnya yang akan dipanggil,
                // maka tetap tampilkan nomor terakhir yang telah dipanggil
                $antrean = RiwayatAntrean::where('loket_id', '=', $loket->id)
                        ->where('status', '=', 'served')
                        ->where('batch', '=', $loket->batch)
                        ->orderBy('id', 'DESC')
                        ->first();
            }
        }

        return view('konfigurasiLoket', [
            'title' => "Konfigurasi Loket " . $loket->nama_loket,
            'loket' => $loket,
            'antrean' => $antrean,
            'jumlah_antrean_di_belakang' => $antrean_di_belakang,
        ]);
    }
}
