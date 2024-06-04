<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTm3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tm3', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('NIK');
            $table->string('konjungtiva');
            $table->string('sklera');
            $table->string('kulit');
            $table->string('leher');
            $table->string('gigi_mulut');
            $table->string('tht');
            $table->string('jantung');
            $table->string('paru');
            $table->string('perut');
            $table->string('tungkai');
            $table->string('gs');
            $table->string('crl');
            $table->string('djj');
            $table->string('usia_kehamilan');
            $table->string('tkrsn_persalinan');
            $table->string('hb');
            $table->string('gula_darah');
            $table->string('gula_darah_pp');
            $table->string('konsultasi');
            $table->string('rekomendasi');
            $table->string('rnca_persalinan');
            $table->string('rnca_kontrasepsi');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tm3');
    }
}
