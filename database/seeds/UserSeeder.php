<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("123123"),
        ]);
        $admin->assignRole("admin");

        $bidan = User::create([
            "name" => "Bidan",
            "email" => "bidan@gmail.com",
            "password" => bcrypt("123123"),
        ]);
        $bidan->assignRole("bidan");

        $ibi = User::create([
            "name" => "Kepala IBI",
            "email" => "ibi@gmail.com",
            "password" => bcrypt("123123"),
        ]);
        $ibi->assignRole("ibi");
    }
}
