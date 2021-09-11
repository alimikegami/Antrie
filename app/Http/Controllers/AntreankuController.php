<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Antrean;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\RiwayatAntrean;
use App\Models\AttachmentAntrean;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AntreankuController extends Controller
{
    public function showAntreanku()
    {
        if (Auth::check()) {
            return view('antreanku', [
                'title' => "Antreanku",
                'antrean' => Antrean::with('kategori')->where('id_pembuat', '=', Auth::id())->get(),
            ]);
        } else {
            return redirect()->route('landingpage');
        }
    }

    public function perbaharuiAntrean(Request $request)
    {
        $antrean = Antrean::where('id', '=', $request->id_antrean)
            ->first();
        $slug = $antrean->slug;
        if ($antrean) {
            if ($antrean->nama_antrean != $request->namaAntrean) {
                $slug = AntreanController::generateSlugAntrean($request->namaAntrean);
                $antrean->slug = $slug;
            }
            $antrean->nama_antrean = $request->namaAntrean;
            $antrean->id_kategori = $request->kategoriAntrean;
            $antrean->provinsi = $request->provinsiAntrean;
            $antrean->alamat = $request->alamatAntrean;
            $antrean->nomor_telepon = $request->teleponAntrean;
            $antrean->waktu_buka = $request->jamBuka;
            $antrean->waktu_tutup = $request->jamTutup;
            $antrean->deskripsi = $request->deskripsiAntrean;

            if ($request->hasFile('gambarAntrean')) {
                $img_file_path = 'public/pictures/' . $antrean->file_path_img;
                if (Storage::exists($img_file_path)) {
                    Storage::delete($img_file_path);
                }
                $path = $request->file('gambarAntrean')->store('public/pictures');
                $temp = explode('/', $path); // Getting the image name after the name is modified
                $file_path_img = $temp[2];
                $antrean->file_path_img = $file_path_img;
            }

            $antrean->save();
            if ($request->hasFile('attachmentAntrean')) {
                $attachment = AttachmentAntrean::where('id_antrean', '=', $request->id_antrean)
                    ->get();
                foreach ($attachment as $item) {
                    if (Storage::exists('public/attachment/' . $item->file_path_attachment)) {
                        Storage::delete('public/attachment/' . $item->file_path_attachment);
                    }
                }
                DB::table('attachment_antrean')
                    ->where('id_antrean', '=', $request->id_antrean)
                    ->delete();

                $files = $request->file('attachmentAntrean');
                foreach ($files as $file) {
                    $path = $file->store('public/attachment');
                    $temp = explode('/', $path);    // Getting the attachment name
                    AttachmentAntrean::create([
                        'id_antrean' => $antrean->id,
                        'file_path_attachment' => $temp[2]
                    ]);
                }
            }

            for ($i = 1; $i < 6; $i++) {
                $nama_loket = 'loket' . $i;
                $id_loket = 'idLoket' . $i;
                $kapasitas = 'kapasitasLoket' . $i;
                $jam_buka = 'jamBukaLoket' . $i;
                $jam_tutup = 'jamTutupLoket' . $i;
                $loket = Loket::where('id', '=', $request->$id_loket)
                    ->first();
                if ($loket) {
                    if ($loket->nama_loket != $request->$nama_loket) {
                        $slug_loket = AntreanController::generateSlugLoket($request->$nama_loket);
                        $loket->slug = $slug_loket;
                    }
                    $loket->nama_loket = $request->$nama_loket;
                    $loket->jumlah_pengantre_maks = $request->$kapasitas;
                    $loket->waktu_buka = $request->$jam_buka;
                    $loket->waktu_tutup = $request->$jam_tutup;
                    $loket->save();
                } else if ($request->$nama_loket != null) {
                    $slug_loket = AntreanController::generateSlugLoket($request->$nama_loket);
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

        $request->session()->flash('alert-success', 'Antrean telah berhasil diperbaharui!');
        return redirect()->route('formEditAntrean', $slug);
    }

    public function editAntrean(Antrean $antrean)
    {
        $antrean = Antrean::with('loket')
            ->where('id', '=', $antrean->id)
            ->get();
        return view('perbaharuiAntrean', [
            'antrean' => $antrean,
            'title' => 'Perbaharui Antrean',
            'kategori' => Kategori::all()
        ]);
    }

    public function aturLoket(Antrean $antrean)
    {
        $antrean = Antrean::with('loket')
            ->where('id', '=', $antrean->id)
            ->first();

        $antrean_di_belakang = [];

        foreach ($antrean->loket as $loket) {
            $antrean_di_belakang[] = (RiwayatAntrean::where('loket_id', '=', $loket->id)
                ->where('status', '=', 'waiting')
                ->where('batch', '=', $loket->batch)
                ->count());
        }

        return view('aturLoket', [
            'antrean' => $antrean,
            'title' => $antrean->nama_antrean,
            'antrean_di_belakang' => $antrean_di_belakang
        ]);
    }

    public function deleteLoket(Request $request)
    {
        $loket = Loket::where('id', '=', $request->id_loket_hapus)
                            ->first();
        $count_loket = Loket::where('antrean_id', '=', $loket->antrean_id)->count();
        if ($count_loket == 1) {
            $request->session()->flash('alert-danger', 'Loket tidak berhasil dihapus!');
            return back()->withInput();
        } 
        $deleted = DB::table('loket')
            ->where('id', '=', $request->id_loket_hapus)
            ->delete();
        if ($deleted > 0) {
            $message = "Penghapusan loket berhasil!";
        } else {
            $message = "Penghapusan loket gagal dilakukan!";
        }
        return back()->withInput();
    }

    public function deleteAntrean(Request $request)
    {
        $deleted = DB::table('antrean')
            ->where('id', '=', $request->id_antrean_hapus)
            ->delete();
        if ($deleted > 0) {
            $message = "Penghapusan antrean berhasil!";
        } else {
            $message = "Penghapusan antrean gagal dilakukan!";
        }
        return back()->withInput();
    }

    public function showKonfigurasiLoket($slug, Loket $loket)
    {
        // Cari nomor antrean pertama yang sedang dilayani
        $antrean = RiwayatAntrean::where('loket_id', '=', $loket->id)
            ->where('status', '=', 'serving')
            ->where('batch', '=', $loket->batch)
            ->orderBy('id', 'ASC')
            ->first();

        // Gimana cara bedain baru buka antrean dan tidak ada orang yang sedang menunggu untuk menampilkan tidak ada antrean?
        // mungkin waktu ambil antrean berikutnya jadi served??

        // Cari jumlah pengantre yang sedang menunggu
        $antrean_di_belakang = RiwayatAntrean::where('loket_id', '=', $loket->id)
            ->where('status', '=', 'waiting')
            ->where('batch', '=', $loket->batch)
            ->count();

        // Jika tidak ada yang di-serve dan antrean di belakang kosong, 
        // periksa apakah antrean berikutnya adalah antrean pertama
        if (is_null($antrean) && $antrean_di_belakang == 0) {
            $next_person = RiwayatAntrean::where('loket_id', '=', $loket->id)
                ->where('status', '=', 'waiting')
                ->where('batch', '=', $loket->batch)
                ->first();
            if (!(is_null($next_person)) && $next_person->nomor_antrean == 1) {
                // Jika belum ada nomor yang dipanggil, maka tampilkan nol
                $antrean = null;
            } else {
                // Jika sudah ada namun tidak ada nomor berikutnya yang akan dipanggil,
                // maka tetap tampilkan nomor terakhir yang telah dipanggil
                $antrean = RiwayatAntrean::where('loket_id', '=', $loket->id)
                    ->where('status', '=', 'served')
                    ->where('batch', '=', $loket->batch)
                    ->orderBy('id', 'DESC')
                    ->first();
            }
        }

        return view('konfigurasiLoket', [
            'title' => "Konfigurasi Loket " . $loket->nama_loket,
            'loket' => $loket,
            'antrean' => $antrean,
            'jumlah_antrean_di_belakang' => $antrean_di_belakang,
        ]);
    }
}
