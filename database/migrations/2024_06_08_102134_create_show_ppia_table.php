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
            $table->string('nama_ibu');
            $table->string('tanggal_screening_hbsag');
            $table->string('tanggal_screening_hiv');
            $table->string('tanggal_screening_sifilis');
            $table->string('kode_specimen_hbsag');
            $table->string('hasil_screening_hbsag');
            $table->string('kode_specimen_hiv');
            $table->string('hasil_screening_hiv');
            $table->string('kode_specimen_sifilis');
            $table->string('hasil_screening_sifilis');
            $table->string('tgl_masuk_pdp');
            $table->string('tgl_mulai_arv');
            $table->string('ditangani_sifilis');
            $table->string('obat_adequat');
            $table->string('dirujuk');
            $table->string('status_hiv');
            $table->string('periksa_sifilis');
            $table->string('faskes_rujukan');
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
        Schema::dropIfExists('show_ppia');
    }
}
