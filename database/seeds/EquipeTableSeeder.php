<?php

use Illuminate\Database\Seeder;

class EquipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipe')->insert([
            'nom_equipe' => 'Zigoto',
            'id_capitaine' => 1,
            'id_jeu' => 1,
        ]);
        
        for ($i=2; $i <= 5; $i++) 
        { 
            DB::table('appartenance')->insert([
                'id_equipe' => 1,
                'id_user' => $i,            
            ]);
        }
    }
}
