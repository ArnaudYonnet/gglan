<?php

use Illuminate\Database\Seeder;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranks = ["Silver 1","Silver 2","Silver 3","Silver 4","Silver elite","Silver elite master",
                  "Gold Nova 1","Gold Nova 2","Gold Nova 3","Gold Nova Master","Master Guardian 1","Master Guardian 2", 
                  "Master Guardian Elite", "Distinguised Master Guardian", "Legendary Eagle", "Legendary Eagle Master", "Supreme Master First Class", "Global Elite"];
        foreach ($ranks as $rank) 
        {
            DB::table('rank')->insert([
            'id_jeu' => 1,
            'nom' => $rank,
            ]);
        }          
    }
}
