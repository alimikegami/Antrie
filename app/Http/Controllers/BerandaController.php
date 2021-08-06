<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    // Return view untuk beranda
    public function index() {
        if (session()->has('ID_pengguna')) {
            $kategori_populer = Kategori::withCount('antrean')->orderBy('antrean_count', 'desc')->first();
            return view('beranda', [
                'title' => "Beranda",
                'antrean' => Antrean::with(['kategori', 'pengguna'])->where('id_kategori', '=', $kategori_populer->id)->get(),
                'kategori_populer' => $kategori_populer,
            ]);
        } else {
            return redirect()->route('landingpage');
        }
    }
}