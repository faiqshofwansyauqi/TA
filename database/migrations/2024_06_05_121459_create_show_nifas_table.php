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
            $table->unsignedBigInteger('id_ibu');
            $table->date('tanggal');
            $table->string('hari');
            $table->string('kf');
            $table->string('td_mmhg');
            $table->integer('suhu');
            $table->string('fe')->nullable();
            $table->string('vit')->nullable();            
            $table->string('ppp')->nullable();
            $table->string('infeksi')->nullable();
            $table->string('hdk')->nullable();
            $table->string('lainnya_komplikasi')->nullable();
            $table->string('tata_laksana')->nullable();
            $table->string('puskesmas')->nullable();
            $table->string('klinik')->nullable();
            $table->string('rsia_rsb')->nullable();
            $table->string('rs')->nullable();
            $table->string('lain_lain_dirujuk')->nullable();
            $table->string('tiba')->nullable();
            $table->string('pulang')->nullable();
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
        Schema::table('show_nifas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_ibu']);
        });
        Schema::dropIfExists('show_nifas');
    }
}
