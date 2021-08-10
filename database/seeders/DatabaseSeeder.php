<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            'nama_kategori' => "Pelayanan Kesehatan",
            'slug' => "pelayanan-kesehatan",
            'img_file_path' => "img/Pelayananpublik.png",
        ]);

        DB::table('kategori')->insert([
            'nama_kategori' => "Instansi Pemerintahan",
            'slug' => "instansi-pemerintahan",
            'img_file_path' => "img/Pelayananpublik.png",
        ]);

        DB::table('kategori')->insert([
            'nama_kategori' => "Acara",
            'slug' => "acara",
            'img_file_path' => "img/Pelayananpublik.png",
        ]);

        DB::table('kategori')->insert([
            'nama_kategori' => "Keuangan",
            'slug' => "keuangan",
            'img_file_path' => "img/Pelayananpublik.png",
        ]);

        DB::table('kategori')->insert([
            'nama_kategori' => "Layanan Perawatan Tubuh",
            'slug' => "layanan-perawatan-tubuh",
            'img_file_path' => "img/Pelayananpublik.png",
        ]);

        DB::table('kategori')->insert([
            'nama_kategori' => "Layanan Otomotif",
            'slug' => "layanan-otomotif",
            'img_file_path' => "img/Pelayananpublik.png",
        ]);

        DB::table('pengguna')->insert([
            'nama' => "Dummy",
            'email' => "antrieantrionline@gmail.com",
            'password' => Hash::make("1234"),
        ]);
    }
}
