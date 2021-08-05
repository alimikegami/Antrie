<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Antrean;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AttachmentAntrean;
use App\Http\Controllers\Controller;

class AntreanController extends Controller
{

    public function show(Antrean $antrean){
        return view('antrean', [
            'title'=>$antrean->nama_antrean,
            'antrean'=>$antrean
        ]);
    }

    public function formPembuatanAntrean(){
        if (session()->has('ID_pengguna')) {
            return view('buatAntrean', [
                'title' => "Buat Antrean",
                'kategori' => Kategori::all()
            ]);
        } else {
            return redirect('login');
        }
    }

    public function generateSlug($nama){
        $slug = Str::slug($nama, '-');
        $i = 2;
        // Can be optimized by finding the latest antrean and adding one to it if it has the same slug
        while (Antrean::where('slug', '=', $slug)->first()) {
            $slug = $slug . "-" . $i;
            $i = $i + 1;
        }
        return $slug;
    }

    public function buatRecordAntrean(Request $request){
        // Saving image file path
        $file_path_img = null;
        if($request->hasFile('gambarAntrean')){
            $path = $request->file('gambarAntrean')->store('pictures');
            $temp = explode('/', $path); // Getting the image name after the name is modified
            $file_path_img = $temp[1];
        }
        $slug = self::generateSlug($request->namaAntrean);
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
            "id_pembuat"=> $request->session()->get('ID_pengguna'),
            "id_kategori"=> $request->kategoriAntrean,
            "slug"=> $slug,
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
                    'antrean_id'=>$antrean->id,
                ]);
            }
        }
    }    
}
