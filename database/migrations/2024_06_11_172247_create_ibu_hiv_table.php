<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbuHivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_hiv', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('tgl_pemberian_arv');
            $table->string('hasil_pemberian_arv');
            $table->string('tgl_bds');
            $table->string('hasil_bds');
            $table->string('tgl_konfirmasi_bds');
            $table->string('hasil_konfirmasi_bds');
            $table->string('tgl_pemeriksaan_balita');
            $table->string('hasil_pemeriksaan_balita');
            $table->string('tgl_perawatan_pdp');
            $table->string('hasil_perawatan_pdp');
            $table->string('tgl_pengobatan_arv');
            $table->string('hasil_pengobatan_arv');
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
        Schema::dropIfExists('ibu_hiv');
    }
}
