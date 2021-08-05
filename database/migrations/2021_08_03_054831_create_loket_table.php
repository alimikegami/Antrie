<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('antrean')) {
            Schema::create('loket', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('antrean_id');
                $table->string('nama_loket', 30);
                $table->string('slug')->unique();
                $table->integer('jumlah_pengantre_maks')->nullable();
                $table->time('waktu_buka');
                $table->time('waktu_tutup');
                $table->enum('status', ['open', 'closed']);
                $table->dateTime('batch')->nullable();
                $table->integer('estimasi_waktu_tunggu')->nullable();
                $table->foreign('antrean_id')->references('id')->on('antrean');
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
        Schema::dropIfExists('loket');
    }
}
