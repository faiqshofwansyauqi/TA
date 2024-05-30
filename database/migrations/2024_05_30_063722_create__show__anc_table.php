<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowAncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show__anc', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->date('tanggal');
            $table->string('usia_kehamilan');
            $table->string('trimester');
            $table->string('keluhan');
            $table->string('berat_badan');
            $table->string('td_mmhg');
            $table->string('lila');
            $table->string('sts_gizi');
            $table->string('tfu');
            $table->string('sts_imunisasi');
            $table->string('djj');
            $table->string('kpl_thd');
            $table->string('tbj');
            $table->string('presentasi');
            $table->string('jmlh_janin');
            $table->string('injeksi');
            $table->string('buku_kia');
            $table->string('fe');
            $table->string('pmt_bumil');
            $table->string('kelas_ibu');
            $table->string('konseling');
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
        Schema::dropIfExists('show__anc');
    }
}
