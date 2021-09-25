<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villages = ["Деревня скрытая в снеге", "Деревня скрытая в горячих источниках", "Деревня скрытая в водовороте", "Деревня скрытая за водопадом", "Деревня скрытая в звуке", "Деревня мерцающего воздуха"
            , "Деревня скрытая в звезде", "Деревня скрытая за луной", "Деревня скрытая в дожде", "Деревня скрытая под камнями", "Деревня скрытая в траве", "Деревня скрытая в облаке", "Деревня скрытая в песке", "Деревня скрытая в тумане", "Деревня скрытая в листве"];

        foreach ($villages as $village) {
            DB::table('villages')->insert([
                'village_name' => $village,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
