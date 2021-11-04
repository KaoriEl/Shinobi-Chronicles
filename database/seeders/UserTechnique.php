<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTechnique extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $length = 17;
        for ($i = 1; $i < $length; $i++) {
            DB::table('enemy_location')->insert([
                'shinobi_id' => rand(1,2),
                'technique_id' => $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
