<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'id' => 1,
            'name' => "店舗１",
        ]);
        DB::table('shops')->insert([
            'id' => 2,
            'name' => "店舗２",
        ]);
    }
}