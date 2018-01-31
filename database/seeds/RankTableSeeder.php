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
        $ranks = ["silver 1","silver 2","silver 3","silver 4","silver elite","silver elite master",
                  "gold nova 1","gold nova 2","gold nova 3","gold nova master","master guardian 1","master guardian 2", 
                  "master guardian elite", "distinguised master guardian", "legendary eagle", "legendary eagle master", "supreme master first class", "Global elite"];
        foreach ($ranks as $rank) 
        {
            DB::table('rank')->insert([
            'id_jeu' => 1,
            'nom' => $rank,
            ]);
        }          
    }
}
