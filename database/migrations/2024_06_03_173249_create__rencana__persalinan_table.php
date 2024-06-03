<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaPersalinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rnca_persalinan', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_persalinan');
            $table->string('NIK');
            $table->string('penolong');
            $table->string('pendamping');
            $table->string('transport');
            $table->string('pendonor');
            $table->string('pendonor_darah');
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
        Schema::dropIfExists('rnca_persalinan');
    }
}
