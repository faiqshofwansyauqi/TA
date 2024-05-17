<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_terdaftar');
            $table->string('nama_anak');
            $table->integer('usia_anak');
            $table->string('tempat_tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->integer('anak_ke');
            $table->string('gol_darah');
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
        Schema::dropIfExists('anak');
    }
}
