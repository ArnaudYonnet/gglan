<?php

use Illuminate\Database\Seeder;

class JeuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jeu')->insert([
            'nom' => "CS:GO",
            'description' => "Un jeu de tir a la premiere personne plutot excitant",
            'nb_jeu' => 5,
        ]);

        DB::table('jeu')->insert([
            'nom' => "Fortnite",
            'description' => "LOL tu meurs plus vite que tu lances la game",
            'nb_jeu' => 5,
        ]);
    }
}
