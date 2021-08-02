<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrean;

class AntreanController extends Controller
{
    public function formPembuatanAntrean(){
        return view('buat_antrean', ['title' => "Buat Antrean"]);
    }

    public function buatRecordAntrean(Request $request){
        $files = $request->file('attachmentAntrean');

        if($request->hasFile('attachmentAntrean'))
        {
            foreach ($files as $file) {
                $file->store('docs');
            }
        }
    }
}
