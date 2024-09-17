<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kb', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_ibu');
            $table->integer('bulan_anak_kecil');
            $table->integer('tahun_anak_kecil');
            $table->integer('anak_laki');
            $table->integer('anak_perempuan');
            $table->enum('status_peserta', ['Pertama', 'Pernah']);
            $table->string('kb_terakhir')->nullable();
            $table->date('haid_terahkhir');
            $table->enum('status_hamil', ['Ya', 'Tidak']);
            $table->string('gravida');
            $table->string('partus');
            $table->string('abortus');
            $table->enum('menyusui', ['Ya', 'Tidak']);
            $table->string('rwyt_pengakit')->nullable();
            $table->enum('keadaan_umum', ['Baik', 'Sedang', 'Kurang']);
            $table->integer('berat_badan');
            $table->string('tkn_darah');
            $table->string('psng_iud')->nullable();
            $table->enum('posisi_rahim', ['Retrofleksi', 'Antefleksi']);
            $table->string('pmrksn_tambahan')->nullable();
            $table->string('alat_knstps');
            $table->string('alat_knstps_dipilih');
            $table->date('tgl_dilayani');
            $table->date('tgl_kembali');
            $table->date('tgl_dicabut')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ibu')->references('id_ibu')->on('ibu')->onDelete('cascade');
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
        Schema::table('kb', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_ibu']);
        });
        Schema::dropIfExists('kb');
    }
}
