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
            $table->id();
            $table->date('tanggal_terdaftar');
            $table->string('nama_ibu');
            $table->string('alamat');
            $table->integer('usia');
            $table->string('tempat_tanggal_lahir');            
            $table->integer('nomer_telepon');
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
        Schema::dropIfExists('ibu');
    }
}
