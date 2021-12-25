<?php

namespace Database\Seeders;

use App\Models\CountryLocation;
use App\Models\EnemyLocation;
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
        (new ClanSeeder())->run();
        (new VillagesSeeder())->run();
        (new ItemSeeder())->run();
        (new ShopSeeder())->run();
        (new QuestsSeeder())->run();
        (new CountrysSeeder())->run();
        (new LocationsSeeder())->run();
        (new CountryLocationSeeder())->run();
        (new EnemySeeder())->run();
        (new EnemyItemSeeder())->run();
        (new EnemyLocationSeeder())->run();
        (new Technicians())->run();
    }

}
