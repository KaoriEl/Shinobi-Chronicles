<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quests = [
            "Спасти кота","Спасти щенка","Победить шиноби","Тренировка ниндзюцу", "Тренировка гендзюцу",
            "Тренировка тайдзюцу","Сопровождение торговца", "Помочь старушке",
            "Работа на почте","Работа на стройке","Доставить письмо","Уборка у каге","Приготовить рамен","Тренировка техник",
            "Работа грузчиком","Прополка лужаек","Поймать разбойников","Охота на кабана","Шпионаж","Заказное убийство", "Защита дайме"
        ];


        foreach ($quests as $quest) {
            DB::table('quests')->insert([
                'quests_name' => $quest,
                'ninjutsu' => rand(1,5),
                'taijutsu' => rand(1,5),
                'genjutsu' => rand(1,5),
                'reward_money' => rand(10,100),
                'status' => "inactive",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
