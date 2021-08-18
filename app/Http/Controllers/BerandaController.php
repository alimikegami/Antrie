<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    // Return view untuk beranda
    public function index() {
        if (Auth::check()) {
            $kategori_populer = Kategori::withCount('antrean')->orderBy('antrean_count', 'desc')->first();
            return view('beranda', [
                'title' => "Beranda",
                'antrean' => Antrean::with(['kategori', 'pengguna'])->where('id_kategori', '=', $kategori_populer->id)->get(),
                'kategori_populer' => $kategori_populer,
                'kategori' => Kategori::all(),
                'nama_user' => Auth::user()->nama
            ]);
        } else {
            return redirect()->route('landingpage');
        }
    }

    public function showAntreanBasedOnCategories(Kategori $kategori){
        if (session()->has('ID_pengguna')) {
            return view('antreanBasedOnCategory', ['antrean' => $kategori->antrean]);
        } else {
            return redirect()->route('landingpage');
        }
    }

    public function showAntreanku(){
        if (Auth::check()) {
            return view('antreanku', [
                'title' => "Antreanku",
                'antrean' => Antrean::with('loket')->where('id_pembuat', '=', Auth::id())->get(),
            ]);
        } else {
            return redirect()->route('landingpage');
        }
    }
}