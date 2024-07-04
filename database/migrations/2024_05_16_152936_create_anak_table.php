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
            $table->unsignedBigInteger('user_id');
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
            $table->string('bayi_lahir');
            $table->string('tempat');
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
        Schema::table('anak', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('anak');
    }
}
