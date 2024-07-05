<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowPpiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_ppia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_ibu');
            $table->dateTime('tanggal_screening_hbsag');
            $table->dateTime('tanggal_screening_hiv');
            $table->dateTime('tanggal_screening_sifilis');
            $table->string('kode_specimen_hbsag');
            $table->string('hasil_screening_hbsag');
            $table->string('kode_specimen_hiv');
            $table->string('hasil_screening_hiv');
            $table->string('kode_specimen_sifilis');
            $table->string('hasil_screening_sifilis');
            $table->dateTime('tgl_masuk_pdp');
            $table->dateTime('tgl_mulai_arv');
            $table->string('ditangani_sifilis');
            $table->string('obat_adequat');
            $table->string('dirujuk');
            $table->string('status_hiv');
            $table->string('periksa_sifilis');
            $table->string('faskes_rujukan');
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
        Schema::table('show_ppia', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('show_ppia');
    }
}
