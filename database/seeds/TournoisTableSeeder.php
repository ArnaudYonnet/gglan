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
            'nom' => 'GG-LAN 5',
            'date_deb' => "2018-04-05",
            'date_fin' => "2018-04-06",
            'description' => "La 5ième édition de la GG-LAN, ça va déchiré du poulet au curry",
        ]);

        DB::table('selection')->insert([
            'id_jeu' => 1,
            'id_tournois' => 1,
        ]);
    }
}
