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
        DB::table('users')->insert([
            'nom' => 'Philippi',
            'prenom' => 'Thibaud',
            'date_naissance' => '1997-03-31',
            'pseudo' => 'Tenebreizh',
            'email' => 'thibaud29@protonmail.com',
            'admin' => 1,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'nom' => 'Moalic',
            'prenom' => 'Baptiste',
            'date_naissance' => '2000-01-01',
            'pseudo' => 'Bapt',
            'email' => 'bapt@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
