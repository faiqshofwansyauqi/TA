<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbuSifilisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_sifilis', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('sifilis_dirujuk');
            $table->string('periksa_sifilis');
            $table->string('hasil_sifilis');
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
        Schema::dropIfExists('ibu_sifilis');
    }
}
