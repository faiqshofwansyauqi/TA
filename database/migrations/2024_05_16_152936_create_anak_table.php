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
            $table->unsignedBigInteger('id_ibu');
            $table->string('nama_anak');
            $table->string('nama_suami');
            $table->string('alamat');
            $table->string('kec');
            $table->string('kab');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('lngkr_kpl_bayi');
            $table->string('anak_ke');
            $table->string('brt_bayi');
            $table->string('pnjg_bayi');
            $table->string('tgl_lahir_bayi');
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
        Schema::table('anak', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_ibu']);
        });
        Schema::dropIfExists('anak');
    }
}
