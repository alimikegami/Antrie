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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MailController;

class AntreanController extends Controller
{

    public function show(Antrean $antrean)
    {
        // Menghitung jumlah pengantre yang menunggu pada suatu loket
        $antrean_di_depan = [];
        $estimasi_waktu_tunggu = [];
        $waktu_fix = [];
        $antrean = Antrean::with('loket')
            ->where('id', '=', $antrean->id)
            ->get()->first();
        foreach ($antrean->loket as $temp) {
            $antrean_di_depan_temp = RiwayatAntrean::where('loket_id', '=', $temp->id)
                ->where('status', '=', 'waiting')
                ->where('batch', '=', $temp->batch)
                ->count();
            $antrean_di_depan[] = $antrean_di_depan_temp;
            $estimasi_waktu_tunggu_temp = DB::select(DB::raw("SELECT AVG(TIME_TO_SEC(TIMEDIFF(ra_1.dipanggil, ra_2.dipanggil))) AS estimasi_waktu_tunggu 
                                            FROM riwayat_antrean AS ra_1 INNER JOIN riwayat_antrean AS ra_2 ON ra_1.id = ra_2.id + 1 
                                            WHERE ra_1.loket_id = :id_loket AND ra_1.batch = :batch_1 AND ra_2.batch = :batch_2"), ['id_loket' => $temp->id, 'batch_1' => $temp->batch, 'batch_2' => $temp->batch]);
            $estimasi_waktu_tunggu = $estimasi_waktu_tunggu_temp;
            $waktu_fix[] = round(($estimasi_waktu_tunggu[0]->estimasi_waktu_tunggu * $antrean_di_depan_temp)/60);
        }

        // dd($estimasi_waktu_tunggu[0][0]->estimasi_waktu_tunggu);

        // Menentukan loket tempat pengguna sudah mengambil nomor antrean
        $loket = RiwayatAntrean::where('status', '=', 'waiting')
            ->where('pengguna_ID', '=', Auth::id())
            ->get();

        $id_loket_antrean = array();
        foreach ($loket as $temp) {
            $id_loket_antrean[] = $temp->loket_id;
        }

        $id_loket_antrean = array_unique($id_loket_antrean);


        // Fetch data kasus harian covid dari API eksternal
        $api_response = Http::withOptions([
            'timeout' => 2,
        ])->get('https://data.covid19.go.id/public/api/prov.json');
        foreach ($api_response['list_data'] as $lokasi) {
            if ($lokasi['key'] === $antrean->provinsi) {
                $kasus_covid = $lokasi['penambahan']['positif'];
            };
        }
        $provinsi = ucwords(strtolower($antrean->provinsi));

        return view('antrean', [
            'title' => $antrean->nama_antrean,
            'antrean' => $antrean,
            'antrean_di_depan' => $antrean_di_depan,
            'loket_tempat_mengantre' => $id_loket_antrean,
            'kasus_covid' => $kasus_covid,
            'estimasi_waktu' => $waktu_fix,
            'provinsi' => $provinsi
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
        if (Auth::check()) {
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
            "id_pembuat" => Auth::id(),
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

    public function bukaLoket(Request $request)
    {
        $loket = Loket::where('id', "=", $request->id_loket_buka)->first();;
        if ($loket) {
            $curr_time = Carbon::now();
            $loket->batch = $curr_time->toDateTimeString();
            $loket->status = 'open';
            $loket->save();
        }

        return back()->withInput();
    }

    public function tutupLoket(Request $request)
    {
        $loket = Loket::where('id', "=", $request->id_loket_tutup)->first();
        if ($loket) {
            $loket->status = 'closed';
            $loket->save();
        }

        return back()->withInput();
    }

    public function tentukanNomorAntrean($loket)
    {
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
            'pengguna_id' => Auth::id(),
            'antrean_id' => $loket->antrean->id,
            'loket_id' => $loket->id,
            'batch' => $loket->batch,
            'nomor_antrean' => $nomor_antrean,
            'status' => 'waiting',
        ]);

        $detail_riwayat_antrean = array(
            'nama_loket' => $loket->nama_loket,
            'nama_antrean' => $loket->antrean->nama_antrean,
            'nomor_antrean' => $nomor_antrean
        );

        return response()->json($detail_riwayat_antrean);
    }

    

    public function majukanAntrean(Request $request)
    {
        $antrean = RiwayatAntrean::where('id', '=', $request->id)->first();
        $antrean->status = "served";
        $antrean->save();
    }

    public function ambilAntreanBerikutnya($id_loket)
    {
        $loket = Loket::where('id', '=', $id_loket)->first();
        $antrean = RiwayatAntrean::where('loket_id', '=', $id_loket)
            ->where('status', '=', 'waiting')
            ->where('batch', '=', $loket->batch)
            ->orderBy('id', 'ASC')
            ->first();
        // dulu cuma waiting saja disini, 2 baris di bawah tidak ada
        if (!is_null($antrean)) {
            $antrean->status = 'serving';
            $antrean->dipanggil = Carbon::now();
            $antrean->save();
        }
        $jumlah_antrean = RiwayatAntrean::where('loket_id', '=', $id_loket)
            ->where('status', '=', 'waiting')
            ->where('batch', '=', $loket->batch)
            ->count();

        // Jika jumlah antrean di belakang lebih dari atau sama dengan 3, maka kirim email ke antrean ke-3
        if ($jumlah_antrean >= 3) {
            $antrean_ke_tiga = RiwayatAntrean::with('pengguna')
                ->where('loket_id', '=', $id_loket)
                ->where('batch', '=', $loket->batch)
                ->where('status', '=', 'waiting')
                ->limit(3)
                ->orderBy('id', 'desc')
                ->first();
            if($antrean_ke_tiga->email != "antrieantrionline@gmail.com") {
                MailController::sendEmail($antrean_ke_tiga->pengguna->nama, $antrean_ke_tiga->pengguna->email, null, null);
            }
        }
        return response()->json($antrean);
    }

    public function autoUpdateJumlahAntrean(Request $request)
    {
        $loket = Loket::where('id', '=', $request->id_loket)->first();
        if ($request->id != -1) {
            $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $request->id_loket)
                ->where('status', '=', 'waiting')
                ->where('batch', '=', $loket->batch)
                ->where('id', '!=', $request->id)
                ->count();
            return response()->json($antrean_di_belakang);
        }
        $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $request->id_loket)
            ->where('status', '=', 'waiting')
            ->where('batch', '=', $loket->batch)
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
