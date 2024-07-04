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
            $table->string('hbo');
            $table->string('hb2');
            $table->string('hbig');
            $table->string('hb3');
            $table->string('hb1');
            $table->string('tanggal_hbsag');
            $table->string('hasil_hbsag');
            $table->string('tanggal_antihbs');
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
