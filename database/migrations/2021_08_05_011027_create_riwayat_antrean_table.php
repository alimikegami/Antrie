<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatAntreanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_antrean', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger("pengguna_id");
            $table->unsignedBigInteger("antrean_id");
            $table->unsignedBigInteger("loket_id");
            $table->dateTime("batch");
            $table->unsignedInteger("nomor_antrean");
            $table->enum("status", ['served', 'canceled', 'waiting']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_antrean');
    }
}
