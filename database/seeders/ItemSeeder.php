<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $clans = ["Абураме", "Акимичи", "Инузука", "Ёцуки", "Джуго", "Кагуя", "Камизуру", "Ооцуцуки", "Такитори", "Фуума", "Хагоромо",
            "Хатаке", "Шимура", "Юки", "Нара", "Сарутоби", "Сенджу", "Узумаки", "Учиха", "Хозуки", "Хьюга", "Яманака"];


        foreach ($clans as $clan) {

            $length = 5;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            DB::table('items')->insert([
                'item_name' => $randomString,
                'item_type' => "test",
                'ninjutsu' => rand(1, 20),
                'taijutsu' => rand(1, 20),
                'genjutsu' => rand(1, 20),
                'clan' => "Кагуя",
                'price' => rand(1, 20),
                'currency' => "rie",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

    }
}
