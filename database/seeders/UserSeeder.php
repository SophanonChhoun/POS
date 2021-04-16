<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "first_name" => "Admin",
            "last_name" => "Admin",
            "email" => "admin@Admin.com",
            "password" => Hash::make('password'),
            "is_enable" => 1,
        ];
        DB::table('users')->insert($data);
    }
}
