<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowKmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_kms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_anak');
            $table->unsignedBigInteger('id_ibu');
            $table->date('tanggal');
            $table->string('berat_badan');
            $table->string('nt');
            $table->string('asi_eksklusif')->nullable();
            $table->timestamps();
            $table->boolean('notified')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ibu')->references('id_ibu')->on('ibu')->onDelete('cascade');
            $table->foreign('id_anak')->references('id_anak')->on('anak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('show_kms', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_ibu']);
            $table->dropForeign(['id_anak']);
        });
        Schema::dropIfExists('show_kms');
    }
}
