<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name' => "Vetements"]);
        DB::table('categories')->insert(['name' => "Tasse"]);
        DB::table('categories')->insert(['name' => "Diplome"]);
        DB::table('categories')->insert(['name' => "Nouriture"]);
        DB::table('categories')->insert(['name' => "Prosit"]);
       
        

    }
}
