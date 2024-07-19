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
            $table->dateTime('tgl_datang');
            $table->unsignedBigInteger('id_ibu');
            $table->integer('usia_ibu');
            $table->text('alamat');
            $table->string('gravida');
            $table->string('partus');
            $table->string('abortus');
            $table->integer('usia_hamil');
            $table->string('keadaan_ibu');
            $table->dateTime('kala1');
            $table->dateTime('kala2');
            $table->dateTime('kala3');
            $table->dateTime('tgl_lahir_bayi');
            $table->string('brt_bayi');
            $table->string('pnjg_bayi');
            $table->string('lngkr_kpl_bayi');
            $table->string('vit_k');
            $table->string('hbo');
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
        Schema::table('persalinan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_ibu']);
        });
        Schema::dropIfExists('persalinan');
    }
}
