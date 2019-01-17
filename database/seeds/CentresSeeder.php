<?php

use Illuminate\Database\Seeder;

class CentresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centres')->insert(['name' => "Strasbourg"]);
        DB::table('centres')->insert(['name' => "Nancy"]);
        DB::table('centres')->insert(['name' => "Nice"]);
    }
}
