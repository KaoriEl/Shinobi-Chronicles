<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Technicians extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technicians =
        [
            "Рассенган",
            "Водная струя",
            "Пустынная тюрьма",
            "Демоническая атака",
            "Железный кулак",
            "Основной лотос",
            "Ловушка волос",
            "Паразитирующие жуки",
            "Мягкий кулак",
            "Песчаные доспехи",
            "Муравьиный ад",
            "Ураганный удар звериной волны",
            "Линия тысяч змей",
            "Блокирующая деревянная стена",
            "Взрывные мины",
            "Пустые голоса цикады",
            "Пауки ветра"
        ];



        foreach ($technicians as $technician) {
            switch (rand(1,3)){
                case 1:
                    $effect=["SLOW"=> rand(30,1000)];
                    break;
                case 2:
                    $effect=["SILENCE"=> rand(30,1000)];
                    break;
                case 3:
                    $effect=["DAMAGE"=> rand(30,1000)];
                    break;
            }
            DB::table('technicians')->insert([
                "name" => $technician,
                "status"=>"active",
                'ninjutsu' => rand(1, 20),
                'taijutsu' => rand(1, 20),
                'genjutsu' => rand(1, 20),
                "effect" => json_encode($effect),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
