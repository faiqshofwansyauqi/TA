<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowKMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_kms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->string('bulan_penimbangan');
            $table->string('berat_badan');
            $table->string('nt');
            $table->string('asi_eksklusif');
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
        Schema::dropIfExists('show_kms');
    }
}
