<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            "name" => "Riel",
            "price" => "4100",
        ];
        DB::table('currencies')->insert($data);
    }
}
