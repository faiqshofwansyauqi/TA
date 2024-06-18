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
            $table->id('id_anak');
            $table->string('nama_anak');
            $table->string('nama_ibu');
            $table->string('nama_suami');
            $table->string('alamat');
            $table->string('kec');
            $table->string('kab');
            $table->string('jenis_kelamin');
            $table->string('jenis_kelahiran');
            $table->string('anak_ke');
            $table->string('berat_bayi');
            $table->string('panjang_bayi');
            $table->string('bayi_bayi');
            $table->string('tempat');
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
