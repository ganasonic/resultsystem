<?php

use Illuminate\Database\Seeder;

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
            [
                'name' => 'turn1', 
                'email' => 'turn1@ganasonic.com', 
                'password' => bcrypt('turnjudge'),
            ],
            [
                'name' => 'turn2', 
                'email' => 'turn2@ganasonic.com', 
                'password' => bcrypt('turnjudge'),
            ],
            [
                'name' => 'turn3', 
                'email' => 'turn3@ganasonic.com', 
                'password' => bcrypt('turnjudge'),
            ],
            [
                'name' => 'turn4', 
                'email' => 'turn4@ganasonic.com', 
                'password' => bcrypt('turnjudge'),
            ],
            [
                'name' => 'turn5', 
                'email' => 'turn5@ganasonic.com', 
                'password' => bcrypt('turnjudge'),
            ],
            [
                'name' => 'air1', 
                'email' => 'air1@ganasonic.com', 
                'password' => bcrypt('airjudge'),
            ],
            [
                'name' => 'air2', 
                'email' => 'air2@ganasonic.com', 
                'password' => bcrypt('airjudge'),
            ],
            [
                'name' => 'time', 
                'email' => 'time@ganasonic.com', 
                'password' => bcrypt('timejudge'),
            ],
            [
                'name' => 'speed', 
                'email' => 'speed@ganasonic.com', 
                'password' => bcrypt('speedjudge'),
            ],
            [
                'name' => 'overall', 
                'email' => 'overall@ganasonic.com', 
                'password' => bcrypt('overalljudge'),
            ],
            [
                'name' => 'head', 
                'email' => 'head@ganasonic.com', 
                'password' => bcrypt('headjudge'),
            ],
            [
                'name' => 'admin', 
                'email' => 'admin@ganasonic.com', 
                'password' => bcrypt('adminjudge'),
            ],
        ]);
    }
}
