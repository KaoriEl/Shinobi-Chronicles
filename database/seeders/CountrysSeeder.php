<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countrys = ["Страна ветра","Страна Воды", "Страна Железа", "Страна Звука","Страна Земли","Страна Молнии"];

        foreach ($countrys as $country) {
            DB::table('countrys')->insert([
                "name" => $country,
                "status"=>"active",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
