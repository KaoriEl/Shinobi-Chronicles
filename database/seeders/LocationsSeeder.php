<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ["Пустыня Демона", "Роуран", "Гробница Песка", "Аванпост разбойников", "🏣 Скрытого песка"];
        foreach ($locations as $location) {
            DB::table('locations')->insert([
                "name" => $location,
                "status" => "active",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
