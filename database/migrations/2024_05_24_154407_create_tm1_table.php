<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTm1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tm1', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('konjungtiva');
            $table->string('sklera');
            $table->string('kulit');
            $table->string('leher');
            $table->string('gigi_mulut');
            $table->string('tht');
            $table->string('jantung');
            $table->string('paru');
            $table->string('perut');
            $table->string('tungkai');
            $table->string('gs');
            $table->string('crl');
            $table->string('djj');
            $table->string('usia_kehamilan');
            $table->string('tkrsn_persalinan');
            $table->string('skrining');
            $table->string('kesimpulan');
            $table->string('rekomendasi');
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
        Schema::dropIfExists('tm1');
    }
}
