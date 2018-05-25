<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 15; $i++) 
        { 
            DB::table('users')->insert([
                'name' => str_random(10),
                'pseudo' => str_random(7),
                'birth_date' => '1994-03-31',
                'email' => 'test'. $i .'@gmail.com',
                'description' => str_random(30),
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
