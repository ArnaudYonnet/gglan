<?php

use Illuminate\Database\Seeder;

class TournoisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournois')->insert([
            'nom_tournois' => 'GG-LAN 7',
            'date_deb' => "2018-05-05",
            'date_fin' => "2018-04-06",
            'description' => "LAN organisé par les étudiants du BOC",
            'place_equipe' => 16,
            'id_jeu' => 1,
        ]);
    }
}
