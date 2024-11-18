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
            $table->string('nama_ibu_kb');
            $table->integer('bulan_anak_kecil')->nullable();;
            $table->integer('tahun_anak_kecil')->nullable();;
            $table->integer('anak_laki')->nullable();;
            $table->integer('anak_perempuan')->nullable();;
            $table->enum('status_peserta', ['Pertama', 'Pernah']);
            $table->string('kb_terakhir')->nullable();
            $table->date('haid_terahkhir');
            $table->enum('status_hamil', ['Ya', 'Tidak']);
            $table->string('gravida')->nullable();;
            $table->string('partus')->nullable();;
            $table->string('abortus')->nullable();;
            $table->enum('menyusui', ['Ya', 'Tidak']);
            $table->string('rwyt_pengakit')->nullable();
            $table->enum('keadaan_umum', ['Baik', 'Sedang', 'Kurang']);
            $table->integer('berat_badan')->nullable();
            $table->string('tkn_darah')->nullable();
            $table->string('psng_iud')->nullable();
            $table->enum('posisi_rahim', ['Retrofleksi', 'Antefleksi'])->nullable();
            $table->string('pmrksn_tambahan')->nullable();
            $table->string('alat_knstps');
            $table->string('alat_knstps_dipilih');
            $table->date('tgl_dilayani');
            $table->date('tgl_kembali');
            $table->date('tgl_dicabut')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        });
        Schema::dropIfExists('kb');
    }
}
