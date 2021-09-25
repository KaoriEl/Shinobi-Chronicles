<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClanSeeder extends Seeder
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
            DB::table('clans')->insert([
                'clan_name' => $clan,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }


    }
}
