<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'dashboard' => 1,
            'players' => 1,
            'tournaments' => 1,
            'meetings' => 1,
            'posts' => 1,
            'partners' => 1,
            'admins' => 1,
            'queues' => 1,
            'important' => 1,
        ]);
    }
}
