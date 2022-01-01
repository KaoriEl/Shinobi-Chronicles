<?php

namespace Database\Seeders;


use App\Models\Administrator;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::create(["name" => "Кривец Ростислав", "vk_link" => "https://vk.com/kaori_el", "role" => "Разработчик"]);
    }
}
