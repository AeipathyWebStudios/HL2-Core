<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('items')->insert([
            'name' => str_random(10),
            'short_desc' => str_random(25),
            'market_price' => rand(0, 5000),
            'atk_pts' => rand(0, 100),
            'def_pts' => rand(0, 100),
			'weight' => 0.01,
			'created_at' => new DateTime(),
			'updated_at' => new DateTime()
        ]);
    }
}
