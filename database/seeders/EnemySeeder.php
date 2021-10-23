<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnemySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enemys = ["Разбойник","Влад"];

        foreach ($enemys as $enemy) {
            DB::table('enemys')->insert([
                "name" => $enemy,
                "status"=>"active",
                'ninjutsu' => rand(1, 20),
                'taijutsu' => rand(1, 20),
                'genjutsu' => rand(1, 20),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
