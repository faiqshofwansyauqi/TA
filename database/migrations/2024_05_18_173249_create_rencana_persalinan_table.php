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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_ibu');
            $table->date('tgl_persalinan');
            $table->string('penolong');
            $table->string('tempat');
            $table->string('pendamping');
            $table->string('transport');
            $table->string('pendonor');
            $table->string('pendonor_darah');
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
        Schema::table('rnca_persalinan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_ibu']);
        });
        Schema::dropIfExists('rnca_persalinan');
    }
}
