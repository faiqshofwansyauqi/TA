<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu', function (Blueprint $table) {
            $table->id('id_ibu');
            $table->unsignedBigInteger('user_id');
            $table->string('puskesmas');
            $table->string('noregis');
            $table->string('nama_ibu');
            $table->string('nama_suami');
            $table->date('tanggal_lahir');
            $table->text('alamat_domisili');
            $table->string('desa');
            $table->string('kab');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaaan_ibu');
            $table->string('nik');
            $table->integer('umur');
            $table->string('rtrw');
            $table->string('kec');
            $table->string('prov');
            $table->string('agama');
            $table->date('tanggal_reg');
            $table->string('posyandu');
            $table->string('nama_kader');
            $table->string('nama_dukum');
            $table->string('jamkesmas');
            $table->string('gol_darah');
            $table->string('telp');
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
        Schema::table('ibu', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('ibu');
    }
}
