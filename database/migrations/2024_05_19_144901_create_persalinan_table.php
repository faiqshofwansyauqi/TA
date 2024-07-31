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
            $table->integer('usia_ibu')->nullable();
            $table->text('alamat')->nullable();
            $table->string('gravida')->nullable();
            $table->string('partus')->nullable();
            $table->string('abortus')->nullable();
            $table->integer('usia_hamil')->nullable();
            $table->string('keadaan_ibu')->nullable();
            $table->dateTime('kala1')->nullable();
            $table->dateTime('kala2')->nullable();
            $table->dateTime('kala3')->nullable();
            $table->dateTime('tgl_lahir_bayi')->nullable();
            $table->string('brt_bayi')->nullable();
            $table->string('pnjg_bayi')->nullable();
            $table->string('lngkr_kpl_bayi')->nullable();
            $table->string('vit_k')->nullable();
            $table->string('hbo')->nullable();
            $table->string('jenis_kelamin')->nullable();
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
