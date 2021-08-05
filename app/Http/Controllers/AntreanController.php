<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Loket;
use App\Models\Antrean;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RiwayatAntrean;
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

    public function konfirmasiAntrean($antrean, Loket $loket){
        return view('ambilNomorAntrean', [
            'title' => "Konfirmasi Antrean",
            'loket'=>$loket
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
    // Function that is used to generate unique slug for each loket
    public function generateSlugLoket($nama){
        $slug = Str::slug($nama, '-');
        $i = 2;
        // Can be optimized by finding the latest antrean and adding one to it if it has the same slug
        while (Loket::where('slug', '=', $slug)->latest()->first()) {
            $slug = $slug . "-" . $i;
            $i = $i + 1;
        }
        return $slug;
    }

    // Function that is used to generate unique slug for each antrean
    public function generateSlugAntrean($nama){
        $slug = Str::slug($nama, '-');
        $i = 2;
        // Can be optimized by finding the latest antrean and adding one to it if it has the same slug
        while (Antrean::where('slug', '=', $slug)->latest()->first()) {
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
        $slug = self::generateSlugAntrean($request->namaAntrean);
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
                $slug_loket = self::generateSlugLoket($request->$nama_loket);
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
                    'slug'=>$slug_loket,
                ]);
            }
        }
    }
    
    public function bukaLoket(Request $request){
        $loket = Loket::where('id', "=", $request->id_loket);
        if ($loket) {
            $curr_time = Carbon::now();
            $loket->batch = $curr_time->toDateTimeString();
            $loket->status = 'open';
            $loket->save();
        }
    }

    public function tutupLoket(Request $request){
        $loket = Loket::where('id', "=", $request->id_loket);
        if ($loket) {
            $loket->status = 'closed';
            $loket->save();
        }
    }

    public function ambilAntrean(Request $req){
        // see if there are already a queue for the current batch
        $antrean = RiwayatAntrean::where('antrean_id', '=', $req->idAntrean)
                                    ->where('loket_id', '=', $req->idLoket)
                                    ->where('batch', '=', $req->batch)
                                    ->latest();
        
        // if there aren't, give 1 as the nomor antrean
        // else, add one to the latest nomor antrean
        if($antrean){ 
            $nomor_antrean = $antrean->nomor_antrean;
            $nomor_antrean = $nomor_antrean+1;
        } else {
            $nomor_antrean = 1;
        }
        
        RiwayatAntrean::create([
            'pengguna_id' => $req->session()->get('ID_pengguna'),
            'antrean_id' => $req->idAntrean,
            'loket_id' => $req->loketId,
            'batch' => $req->batch,
            'nomor_antrean' => $nomor_antrean,
            'status' => 'waiting',
        ]);

    }
}
