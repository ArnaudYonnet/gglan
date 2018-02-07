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
            'nom_tournois' => 'GG-LAN 5',
            'date_deb_tournois' => "2018-04-05",
            'date_fin_tournois' => "2018-04-06",
            'desc_tournois' => "La 5ième édition de la GG-LAN, ça va déchiré du poulet au curry",
        ]);
    }
}
