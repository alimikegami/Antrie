<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Antrean;
use Illuminate\Http\Request;
use App\Models\AttachmentAntrean;

class AntreanController extends Controller
{
    public function formPembuatanAntrean(){
        if (session()->has('ID_pengguna')) {
            return view('buat_antrean', ['title' => "Buat Antrean"]);
        }
        return redirect('login');
    }

    public function buatRecordAntrean(Request $request){
        // Saving image file path
        $file_path_img = null;
        if($request->hasFile('gambarAntrean')){
            $path = $request->file('gambarAntrean')->store('pictures');
            $temp = explode('/', $path); // Getting the image name after the name is modified
            $file_path_img = $temp[1];
        }

        // Creating antrean record
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

        // Saving attachment file path and creating the record for each attachment
        if($request->hasFile('attachmentAntrean'))
        {
            $files = $request->file('attachmentAntrean');
            foreach ($files as $file) {
                $path = $file->store('attachment');
                $temp = explode('/', $path);    // Getting the attachment name
                AttachmentAntrean::create([
                    'id_antrean'=> $antrean->id,
                    'file_path_attachment'=>$temp[1]
                ]);
            }
        }
        
        // Create loket
        for ($i=1; $i < 6; $i++) { 
            $nama_loket = 'loket' . $i;
            if($request->$nama_loket != null) {
                $kapasitas = 'kapasitasLoket' . $i;
                $jam_buka = 'jamBukaLoket' . $i;
                $jam_tutup = 'jamTutupLoket' . $i;
                Loket::create([
                    'nama_loket'=>$request->$nama_loket,
                    'jumlah_pengantre_maks'=>$request->$kapasitas,
                    'waktu_buka' => $request->$jam_buka,
                    'waktu_tutup' => $request->$jam_tutup,
                    'estimasi_waktu_tunggu'=>null,
                    'status' => 'closed',
                    'id_antrean'=>$antrean->id,
                ]);
            }
        }
    }
}
