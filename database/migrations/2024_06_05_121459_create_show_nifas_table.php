<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowNifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_nifas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_ibu');
            $table->date('tanggal');
            $table->string('hari');
            $table->string('kf');
            $table->string('td_mmhg');
            $table->integer('suhu');
            $table->string('buku_kia');
            $table->string('fe');
            $table->string('vit');
            $table->string('cd_4');
            $table->string('anti_malaria');
            $table->string('anti_tb');
            $table->string('arv');
            $table->string('ppp');
            $table->string('infeksi');
            $table->string('hdk');
            $table->string('lainnya_komplikasi');
            $table->string('klasifikasi');
            $table->string('tata_laksana');
            $table->string('puskesmas');
            $table->string('klinik');
            $table->string('rsia_rsb');
            $table->string('rs');
            $table->string('lain_lain_dirujuk');
            $table->string('tiba');
            $table->string('pulang');
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
        Schema::table('show_nifas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('show_nifas');
    }
}
