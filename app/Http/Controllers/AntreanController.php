<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrean;
use App\Models\AttachmentAntrean;

class AntreanController extends Controller
{
    public function formPembuatanAntrean(){
        return view('buat_antrean', ['title' => "Buat Antrean"]);
    }

    public function buatRecordAntrean(Request $request){
        $file_path_img = null;
        if($request->hasFile('gambarAntrean')){
            $path = $request->file('gambarAntrean')->store('pictures');
            $temp = explode('/', $path);
            $file_path_img = $temp[1];
        }

        $antrean = Antrean::create([
            "nama_antrean"=> $request->namaAntrean,
            "deskripsi"=> $request->deskripsiAntrean,
            "provinsi"=> $request->provinsiAntrean,
            "alamat"=> $request->alamatAntrean,
            "nomor_telepon"=> $request->teleponAntrean,
            "waktu_buka"=> $request->jamBuka,
            "waktu_tutup"=> $request->jamTutup,
            "file_path_img"=> $file_path_img,
            "id_pembuat"=> 1,
            "id_kategori"=> $request->kategoriAntrean,
        ]);

        // $file_path_attachment = array();
        if($request->hasFile('attachmentAntrean'))
        {
            $files = $request->file('attachmentAntrean');
            foreach ($files as $file) {
                $path = $file->store('attachment');
                $temp = explode('/', $path);
                // $file_path_attachment[] = $temp[1];
                AttachmentAntrean::create([
                    'id_antrean'=> $antrean->id,
                    'file_path_attachment'=>$temp[1]
                ]);
            }
        }

        
    }
}
