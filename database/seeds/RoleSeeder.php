<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name" => "Admin",
            "guard_name" => "web",
        ]);

        Role::create([
            "name" => "Bidan",
            "guard_name" => "web",
        ]);

        Role::create([
            "name" => "Puskesmas",
            "guard_name" => "web",
        ]);

        Role::create([
            "name" => "IBI",
            "guard_name" => "web",
        ]);
    }
}
