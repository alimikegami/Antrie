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
    public function index()
    {
        $kategori_populer = Kategori::withCount('antrean')->orderBy('antrean_count', 'desc')->first();
        return view('beranda', [
            'title' => "Beranda",
            'antrean' => Antrean::with(['kategori', 'pengguna'])->where('id_kategori', '=', $kategori_populer->id)->get(),
            'kategori_populer' => $kategori_populer,
            'kategori' => Kategori::all(),
        ]);
    }

    public function showAntreanBasedOnCategories(Kategori $kategori)
    {
        return view('all-antrean', ['antrean' => $kategori->antrean, 'title' => $kategori->nama_kategori]);
    }

    public function showSearchResult()
    {
        $keyword = request('query');
        $search_result = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                    ->get();
        return view('all-antrean', ['antrean' => $search_result, 'title' => "Search Results"]);
    }
}
