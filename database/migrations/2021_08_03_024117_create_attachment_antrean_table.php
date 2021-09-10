<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentAntreanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('antrean')) {
            Schema::create('attachment_antrean', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_antrean');
                $table->string('file_path_attachment', 50);
                $table->timestamps();
                $table->foreign('id_antrean')->references('id')->on('antrean')->onDelete('cascade');
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
        Schema::dropIfExists('attachment_antrean');
    }
}
