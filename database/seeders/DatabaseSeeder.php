<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        (new ClanSeeder())->run();
//        (new VillagesSeeder())->run();
//          (new ItemSeeder())->run();
//          (new ShopSeeder())->run();
          (new QuestsSeeder())->run();
    }

}
