<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKunjunganUlang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan_ulang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kb');
            $table->date('tgl_dilayani');
            $table->string('berat_badan', 50)->default('');
            $table->string('tkn_darah', 50)->default('');
            $table->enum('interval', ['90 Hari', '30 Hari', '3 Tahun', '5 Tahun']);
            $table->date('tgl_kembali');
            $table->foreign('id_kb')->references('id')->on('kb')->onDelete('cascade');
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
        Schema::table('kunjungan_ulang', function (Blueprint $table) {
            $table->dropForeign(['id_kb']);
        });
        Schema::dropIfExists('kunjungan_ulang');
    }
}
