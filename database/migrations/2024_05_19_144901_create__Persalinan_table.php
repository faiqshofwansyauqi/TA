<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersalinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persalinan', function (Blueprint $table) {
            $table->id();
            $table->string('id_ibu');
            $table->string('kala1');
            $table->string('kala2');
            $table->string('bayi_lahir');
            $table->string('piasenta');
            $table->string('pendarahan');
            $table->string('usia_kehamilan');
            $table->string('usia_kemilan');
            $table->string('usia_hpht');
            $table->string('keadaan_ibu');
            $table->string('keadaan_bayi');
            $table->string('berat_bayi');
            $table->string('pesentasi');
            $table->string('tempat');
            $table->string('penolong');
            $table->string('cara_persalinan');
            $table->string('menejemen');
            $table->string('pelayanan');
            $table->string('integrasi');
            $table->string('komplikasi');
            $table->string('keadaan_tiba');
            $table->string('rujuk');
            $table->string('alamat_bersalin');
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
        Schema::dropIfExists('persalinan');
    }
}
