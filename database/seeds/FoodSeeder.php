<?php

use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food')->insert([
            'name' => Str::random(10),
            'price' => 10000,
            'status' => 'ready',
        ]);
    }
}
