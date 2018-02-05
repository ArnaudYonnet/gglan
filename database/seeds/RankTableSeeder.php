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

        $images = ["silver_1.png","silver_2.png","silver_3.png","silver_4.png","silver_elite.png","silver_elite_master.png",
                   "gold_nova_1.png","gold_nova_2.png","gold_nova_3.png","gold_nova_master.png","master_guardian_1.png","master_guardian_2.png", 
                   "master_guardian_elite.png","distinguised_master_guardian.png","legendary_eagle.png","legendary_eagle_master.png",
                   "supreme_master_first_class.png", "global_elite.png"];
        foreach ($ranks as $key=>$rank) 
        {
            DB::table('rank')->insert([
            'id_jeu' => 1,
            'nom' => $rank,
            'image' => '/img/csgo/'.$images[$key],
            ]);
        }          
    }
}
