<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbuHepatitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_hepatitis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_ibu');
            $table->dateTime('hbo');
            $table->dateTime('hb2');
            $table->dateTime('hbig');
            $table->dateTime('hb3');
            $table->dateTime('hb1');
            $table->dateTime('tanggal_hbsag');
            $table->string('hasil_hbsag');
            $table->dateTime('tanggal_antihbs');
            $table->string('hasil_antihbs');
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
        Schema::table('ibu_hepatitis', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('ibu_hepatitis');
    }
}
