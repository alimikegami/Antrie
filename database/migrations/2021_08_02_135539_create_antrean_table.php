<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntreanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('kategori') && Schema::hasTable('pengguna')) {
            Schema::create('antrean', function (Blueprint $table) {
                $table->id();
                $table->string('nama_antrean', 30);
                $table->unsignedBigInteger('id_pembuat');
                $table->unsignedBigInteger('id_kategori');
                $table->text('deskripsi');
                $table->string('provinsi', 25);
                $table->string('alamat');
                $table->string('slug')->unique();
                $table->string('nomor_telepon', 15);
                $table->time('waktu_buka');
                $table->time('waktu_tutup');
                $table->string('file_path_img', 50)->nullable();
                $table->foreign('id_pembuat')->references('id')->on('pengguna');
                $table->foreign('id_kategori')->references('id')->on('kategori');
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('antrean');
    }
}
