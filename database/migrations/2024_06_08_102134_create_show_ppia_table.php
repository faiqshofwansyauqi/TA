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
            $table->unsignedBigInteger('id_ibu');
            $table->date('tanggal_screening_hbsag')->nullable();
            $table->date('tanggal_screening_hiv')->nullable();
            $table->date('tanggal_screening_sifilis')->nullable();
            $table->string('kode_specimen_hbsag')->nullable();
            $table->string('hasil_screening_hbsag')->nullable();
            $table->string('kode_specimen_hiv')->nullable();
            $table->string('hasil_screening_hiv')->nullable();
            $table->string('kode_specimen_sifilis')->nullable();
            $table->string('hasil_screening_sifilis')->nullable();
            $table->date('tgl_masuk_pdp')->nullable();
            $table->date('tgl_mulai_arv')->nullable();
            $table->string('ditangani_sifilis')->nullable();
            $table->string('obat_adequat')->nullable();
            $table->string('dirujuk')->nullable();
            $table->string('status_hiv')->nullable();
            $table->string('periksa_sifilis')->nullable();
            $table->string('faskes_rujukan')->nullable();
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
        Schema::table('show_ppia', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_user']);
        });
        Schema::dropIfExists('show_ppia');
    }
}
