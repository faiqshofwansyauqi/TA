<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRopbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ropb', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_ibu');
            $table->string('gravida');
            $table->string('partus');
            $table->string('abortus');
            $table->string('hidup');
            $table->string('rwyt_komplikasi');
            $table->string('pnykt_kronis_alergi');
            $table->date('tgl_periksa');
            $table->date('tgl_hpht');
            $table->date('tksrn_persalinan');
            $table->date('prlnan_sebelum')->nullable();
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('buku_kia');
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
        Schema::table('ropb', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('ropb');
    }
}
