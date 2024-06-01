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
        Schema::create('show_anc', function (Blueprint $table) {
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
            $table->string('hemoglobin');
            $table->string('glcs_urine');
            $table->string('sifilis');
            $table->string('hbsag');
            $table->string('hiv');
            $table->string('arv');
            $table->string('malaria');
            $table->string('obat_malaria');
            $table->string('kelambu');
            $table->string('skrining_anam');
            $table->string('dahak');
            $table->string('tbc');
            $table->string('obat_TB');
            $table->string('sehat');
            $table->string('kontak_erat');
            $table->string('suspek');
            $table->string('konfimasi');
            $table->string('hdk');
            $table->string('abortus');
            $table->string('pendarahan');
            $table->string('infeksi');
            $table->string('anemia');
            $table->string('kpd');
            $table->string('lain_lain');
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
        Schema::dropIfExists('show_anc');
    }
}
