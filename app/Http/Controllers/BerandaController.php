<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    // Return view untuk beranda
    public function index() {
        if (session()->has('ID_pengguna')) {
            return view('beranda', [
                'title' => "Beranda",
                'antrean' => Antrean::with(['kategori', 'pengguna'])->get()
            ]);
        } else {
            return redirect()->route('landingpage');
        }
    }
}