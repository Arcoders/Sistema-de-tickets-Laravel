<?php

use Illuminate\Database\Seeder;
use App\User;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Support - Project 1
        User::create([ // 3
        	'name' => 'Support S1',
        	'email' => 'support1@gmail.com',
        	'password' => bcrypt('laravel'),
        	'role' => 1
        ]);
    }
}
