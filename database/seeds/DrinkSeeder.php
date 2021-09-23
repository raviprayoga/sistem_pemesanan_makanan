<?php

use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->insert([
            'name' => Str::random(10),
            'price' => 10000,
            'status' => 'ready',
        ]);
    }
}
