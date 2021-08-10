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

    public function show(Antrean $antrean)
    {
        return view('antrean', [
            'title' => $antrean->nama_antrean,
            'antrean' => $antrean
        ]);
    }

    public function konfirmasiAntrean($antrean, Loket $loket)
    {
        return view('ambilNomorAntrean', [
            'title' => "Konfirmasi Antrean",
            'loket' => $loket
        ]);
    }

    public function formPembuatanAntrean()
    {
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
    public function generateSlugLoket($nama)
    {
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
    public function generateSlugAntrean($nama)
    {
        $slug = Str::slug($nama, '-');
        $i = 2;
        // Can be optimized by finding the latest antrean and adding one to it if it has the same slug
        while (Antrean::where('slug', '=', $slug)->latest()->first()) {
            $slug = $slug . "-" . $i;
            $i = $i + 1;
        }
        return $slug;
    }

    public function buatRecordAntrean(Request $request)
    {
        // Saving image file path
        $file_path_img = null;
        if ($request->hasFile('gambarAntrean')) {
            $path = $request->file('gambarAntrean')->store('pictures');
            $temp = explode('/', $path); // Getting the image name after the name is modified
            $file_path_img = $temp[1];
        }
        $slug = self::generateSlugAntrean($request->namaAntrean);
        // Creating antrean record
        $antrean = Antrean::create([
            "nama_antrean" => $request->namaAntrean,
            "deskripsi" => $request->deskripsiAntrean,
            "provinsi" => $request->provinsiAntrean,
            "alamat" => $request->alamatAntrean,
            "nomor_telepon" => $request->teleponAntrean,
            "waktu_buka" => $request->jamBuka,
            "waktu_tutup" => $request->jamTutup,
            "file_path_img" => $file_path_img,
            "id_pembuat" => $request->session()->get('ID_pengguna'),
            "id_kategori" => $request->kategoriAntrean,
            "slug" => $slug,
        ]);

        // Saving attachment file path and creating the record for each attachment
        if ($request->hasFile('attachmentAntrean')) {
            $files = $request->file('attachmentAntrean');
            foreach ($files as $file) {
                $path = $file->store('attachment');
                $temp = explode('/', $path);    // Getting the attachment name
                AttachmentAntrean::create([
                    'id_antrean' => $antrean->id,
                    'file_path_attachment' => $temp[1]
                ]);
            }
        }

        // Create loket

        for ($i = 1; $i < 6; $i++) {
            $nama_loket = 'loket' . $i;
            if ($request->$nama_loket != null) {
                $slug_loket = self::generateSlugLoket($request->$nama_loket);
                $kapasitas = 'kapasitasLoket' . $i;
                $jam_buka = 'jamBukaLoket' . $i;
                $jam_tutup = 'jamTutupLoket' . $i;
                Loket::create([
                    'nama_loket' => $request->$nama_loket,
                    'jumlah_pengantre_maks' => $request->$kapasitas,
                    'waktu_buka' => $request->$jam_buka,
                    'waktu_tutup' => $request->$jam_tutup,
                    'estimasi_waktu_tunggu' => null,
                    'status' => 'closed',
                    'antrean_id' => $antrean->id,
                    'slug' => $slug_loket,
                ]);
            }
        }
    }

    public function bukaLoket($id)
    {
        $loket = Loket::where('id', "=", $id)->first();;
        if ($loket) {
            $curr_time = Carbon::now();
            $loket->batch = $curr_time->toDateTimeString();
            $loket->status = 'open';
            $loket->save();
        }

        return redirect()->route('');
    }

    public function tutupLoket($id)
    {
        $loket = Loket::where('id', "=", $id)->first();
        if ($loket) {
            $loket->status = 'closed';
            $loket->save();
        }
    }

    public function tentukanNomorAntrean($loket){
        // see if there are already a queue for the current batch
        $riwayat = RiwayatAntrean::with('loket')
            ->where('antrean_id', '=', $loket->antrean->id)
            ->where('loket_id', '=', $loket->id)
            ->where('batch', '=', $loket->batch)
            ->latest()->first();

        // if there aren't, give 1 as the nomor antrean
        // else, add one to the latest nomor antrean
        // dd($riwayat);
        if ($riwayat) {
            $nomor_antrean = $riwayat->nomor_antrean;
            $nomor_antrean = $nomor_antrean + 1;
            // if the number is the same as the limit, then close the 'loket'
            if ($nomor_antrean == $riwayat->loket->jumlah_pengantre_maks) {
                $riwayat->loket->status = 'closed';
                $riwayat->save();
            }
        } else {
            $nomor_antrean = 1;
        }

        return $nomor_antrean;
    }

    public function ambilAntrean($antrean, Loket $loket)
    {
        $nomor_antrean = $this->tentukanNomorAntrean($loket);

        RiwayatAntrean::create([
            'pengguna_id' => session()->get('ID_pengguna'),
            'antrean_id' => $loket->antrean->id,
            'loket_id' => $loket->id,
            'batch' => $loket->batch,
            'nomor_antrean' => $nomor_antrean,
            'status' => 'waiting',
        ]);
    }

    public function showKonfigurasiLoket($slug, Loket $loket)
    {
        $antrean = RiwayatAntrean::where('loket_id', '=', $loket->id)
            ->where('status', '=', 'waiting')
            ->orderBy('id', 'ASC')
            ->first();
        if (is_null($antrean)) {
            $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $loket->id)
                ->where('status', '=', 'waiting')
                ->count();
        } else {
            $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $loket->id)
                ->where('status', '=', 'waiting')
                ->where('id', '!=', $antrean->id)
                ->count();
        }

        return view('konfigurasiLoket', [
            'title' => "Konfigurasi Loket " . $loket->nama_loket,
            'loket' => $loket,
            'antrean' => $antrean,
            'jumlah_antrean_di_belakang' => $antrean_di_belakang,
        ]);
    }

    public function majukanAntrean(Request $request)
    {
        $antrean = RiwayatAntrean::where('id', '=', $request->id)->first();
        $antrean->status = "served";
        $antrean->save();
    }

    public function ambilAntreanBerikutnya($id_loket)
    {
        $antrean = RiwayatAntrean::where('loket_id', '=', $id_loket)
            ->where('status', '=', 'waiting')
            ->orderBy('id', 'ASC')
            ->first();
        return response()->json($antrean);
    }

    public function autoUpdateJumlahAntrean(Request $request)
    {
        if ($request->id != -1) {
            $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $request->id_loket)
                ->where('status', '=', 'waiting')
                ->where('id', '!=', $request->id)
                ->count();
            return response()->json($antrean_di_belakang);
        }
        $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $request->id_loket)
            ->where('status', '=', 'waiting')
            ->count();
        return response()->json($antrean_di_belakang);
    }

    public function submitAntreanOffline(Request $request)
    {
        $loket = Loket::with('antrean')
                        ->where('id', '=', $request->id_loket)
                        ->get()->first();
        $nomor_antrean = $this->tentukanNomorAntrean($loket);
        $antrean = RiwayatAntrean::create([
            'pengguna_id' => 1,
            'antrean_id' => $loket->antrean->id,
            'loket_id' => $loket->id,
            'batch' => $loket->batch,
            'nomor_antrean' => $nomor_antrean,
            'status' => 'waiting',
        ]);
        return response()->json($antrean);
    }
}
