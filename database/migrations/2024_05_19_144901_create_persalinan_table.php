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
            $table->unsignedBigInteger('user_id');
            $table->string('nama_ibu');
            $table->string('kala1');
            $table->string('kala2');
            $table->dateTime('bayi_lahir');
            $table->dateTime('piasenta');
            $table->string('pendarahan');
            $table->string('usia_kehamilan');
            $table->string('usia_hpht');
            $table->string('keadaan_ibu');
            $table->string('keadaan_bayi');
            $table->string('berat_bayi');
            $table->string('jenis_kelamin');
            $table->string('panjang_bayi');
            $table->string('pesentasi');
            $table->string('tempat');
            $table->string('penolong');
            $table->string('cara_persalinan');
            $table->string('menejemen');
            $table->string('pelayanan');
            $table->string('integrasi');
            $table->string('detail_integrasi');
            $table->string('komplikasi');
            $table->string('keadaan_tiba');
            $table->string('keadaan_pulang');
            $table->string('rujuk');
            $table->text('alamat_bersalin');
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
        Schema::table('persalinan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('persalinan');
    }
}
