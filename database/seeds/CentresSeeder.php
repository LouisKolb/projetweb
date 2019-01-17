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
        DB::table('centres')->insert(['name' => "Reims"]);
        DB::table('centres')->insert(['name' => "Arras"]);
        DB::table('centres')->insert(['name' => "Lille"]);
        DB::table('centres')->insert(['name' => "Rouen"]);
        DB::table('centres')->insert(['name' => "Paris Nanterre"]);
        DB::table('centres')->insert(['name' => "Orléans"]);
        DB::table('centres')->insert(['name' => "Caen"]);
        DB::table('centres')->insert(['name' => "Le Mans"]);
        DB::table('centres')->insert(['name' => "Chêteauroux"]);
        DB::table('centres')->insert(['name' => "Angoulème"]);
        DB::table('centres')->insert(['name' => "La Rochelle"]);
        DB::table('centres')->insert(['name' => "Nantes"]);
        DB::table('centres')->insert(['name' => "Saint-Nazaire"]);
        DB::table('centres')->insert(['name' => "Brest"]);
        DB::table('centres')->insert(['name' => "Dijon"]);
        DB::table('centres')->insert(['name' => "Lyon"]);
        DB::table('centres')->insert(['name' => "Grenoble"]);
        DB::table('centres')->insert(['name' => "Bordeaux"]);
        DB::table('centres')->insert(['name' => "Toulouse"]);
        DB::table('centres')->insert(['name' => "Pau"]);
        DB::table('centres')->insert(['name' => "Montpellier"]);
        DB::table('centres')->insert(['name' => "Aix-en-Provence"]);
        DB::table('centres')->insert(['name' => "Nice"]);

    }
}
