<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $length = 22;
        for ($i = 1; $i < $length; $i++) {
            DB::table('shop_items')->insert([
                'item_id' => $i,
                'status' => "active",
                'shop' => "all",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }


    }
}
