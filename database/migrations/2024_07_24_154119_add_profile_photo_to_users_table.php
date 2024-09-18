<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePhotoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_photo')->nullable()->after('password')->nullable();
            $table->date('tgl_lahir')->nullable()->after('password')->nullable();
            $table->string('nip')->nullable()->after('tgl_lahir')->nullable();
            $table->text('alamat')->nullable()->after('nip')->nullable();
            $table->string('puskesmas')->nullable()->after('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_photo');
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('nip');
            $table->dropColumn('alamat');
            $table->dropColumn('puskesmas');
        });
    }
}
