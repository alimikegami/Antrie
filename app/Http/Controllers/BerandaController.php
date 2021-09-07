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
        $kategori_count = Antrean::where('id_kategori', '=', $kategori->id)
        ->count();
        return view('all-antrean', ['antrean' => $kategori->antrean, 'title' => $kategori->nama_kategori, 'count' => $kategori_count, 'kategori' => Kategori::all()]);
    }

    public function showSearchResult()
    {
        $keyword = request('query');
        $provinsi = request('provinsi');
        $kategori = request('kategori');
        if ($kategori != "" && $provinsi != "") {
            $search_result = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                        ->where('id_kategori', '=', $kategori)
                                        ->where('provinsi', '=', $provinsi)
                                        ->get();
            $search_count = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                        ->where('id_kategori', '=', $kategori)
                                        ->where('provinsi', '=', $provinsi)
                                        ->count();
        } elseif ($kategori != "") {
            $search_result = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                        ->where('id_kategori', '=', $kategori)
                                        ->get();
            $search_count = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                        ->where('id_kategori', '=', $kategori)
                                        ->count();
        } elseif ($provinsi != "") {
            $search_result = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                        ->where('provinsi', '=', $provinsi)
                                        ->get();
            $search_count = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                    ->where('provinsi', '=', $provinsi)
                                    ->count();
        } else {
            $search_result = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                        ->get();
            $search_count = Antrean::where('nama_antrean', 'LIKE', '%'.$keyword.'%')
                                        ->count();
        }
        
        // dd($search_count);
        return view('all-antrean', ['antrean' => $search_result, 'title' => "Search Results", 'count' => $search_count, 'kategori' => Kategori::all()]);
    }
}
