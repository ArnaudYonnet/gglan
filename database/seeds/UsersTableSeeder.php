-<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prenoms = ["Paul", "Pierre", "Jacques", "Kévin", "Nicolas", "Alexandre", "Jérémie", "Valentin", "Baptiste", "Batman"];

        DB::table('users')->insert([
            'id_public' => str_random(5),
            'nom' => 'Papel',
            'prenom' => 'Thibaud',
            'date_naissance' => '1997-03-31',
            'pseudo' => 'Tenebreizh',
            'email' => 'test@gmail.com',
            'admin' => 1,
            'password' => bcrypt('secret'),
            'type' => 'joueur',
        ]);
        
        for ($i=0; $i < count($prenoms); $i++)
        {
             DB::table('users')->insert([
                'id_public' => str_random(5),
                'nom' => str_random(5),
                'prenom' => $prenoms[$i],
                'date_naissance' => '2000-01-01',
                'pseudo' => str_random(5),
                'email' => $prenoms[$i].'@gmail.com',
                'password' => bcrypt('secret'),
                'type' => 'joueur',
            ]);
        }
       
    }
}
