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
            $table->string('td_mmhg')->nullable();
            $table->string('lila')->nullable();
            $table->string('sts_gizi')->nullable();
            $table->string('tfu')->nullable();
            $table->string('sts_imunisasi')->nullable();
            $table->string('djj')->nullable();
            $table->string('kpl_thd')->nullable();
            $table->string('tbj')->nullable();
            $table->string('presentasi')->nullable();
            $table->string('jmlh_janin')->nullable();
            $table->string('buku_kia')->nullable();
            $table->string('fe')->nullable();
            $table->string('pmt_bumil')->nullable();
            $table->string('kelas_ibu')->nullable();
            $table->string('konseling')->nullable();
            $table->string('hemoglobin')->nullable();
            $table->string('glcs_urine')->nullable();
            $table->string('sifilis')->nullable();
            $table->string('hbsag')->nullable();
            $table->string('hiv')->nullable();
            $table->string('arv')->nullable();
            $table->string('skrining_anam')->nullable();
            $table->string('dahak')->nullable();
            $table->string('tbc')->nullable();
            $table->string('obat_TB')->nullable();
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
            $table->string('tiba')->nullable();
            $table->string('pulang')->nullable();
            $table->string('keterangan');
            $table->boolean('notified')->default(false);
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
