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
            $table->unsignedBigInteger('user_id');
            $table->string('nama_ibu');
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
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ibu_hiv', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('ibu_hiv');
    }
}
