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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_ibu');
            $table->date('tanggal');
            $table->string('usia_kehamilan');
            $table->string('trimester');
            $table->string('keluhan');
            $table->string('berat_badan');
            $table->string('td_mmhg');
            $table->string('lila');
            $table->string('sts_gizi');
            $table->string('tfu')->nullable();
            $table->string('sts_imunisasi')->nullable();
            $table->string('djj')->nullable();
            $table->string('kpl_thd')->nullable();
            $table->string('tbj')->nullable();
            $table->string('presentasi')->nullable();
            $table->string('jmlh_janin')->nullable();
            $table->string('buku_kia');
            $table->string('fe')->nullable();
            $table->string('pmt_bumil');
            $table->string('kelas_ibu');
            $table->string('konseling');
            $table->string('hemoglobin')->nullable();
            $table->string('glcs_urine')->nullable();
            $table->string('sifilis')->nullable();
            $table->string('hbsag')->nullable();
            $table->string('hiv')->nullable();
            $table->string('arv')->nullable();
            $table->string('skrining_anam');
            $table->string('dahak');
            $table->string('tbc');
            $table->string('obat_TB');
            $table->string('hdk')->nullable();
            $table->string('abortus')->nullable();
            $table->string('pendarahan')->nullable();
            $table->string('infeksi')->nullable();
            $table->string('kpd')->nullable();
            $table->string('lain_lain_komplikasi')->nullable();
            $table->string('tata_laksana')->nullable();
            $table->string('puskesmas')->nullable();
            $table->string('klinik')->nullable();
            $table->string('rsia_rsb')->nullable();
            $table->string('rs')->nullable();
            $table->string('lain_lain_dirujuk')->nullable();
            $table->string('tiba');
            $table->string('pulang');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ibu')->references('id_ibu')->on('ibu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('show_anc', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_ibu']);
        });
        Schema::dropIfExists('show_anc');
    }
}
