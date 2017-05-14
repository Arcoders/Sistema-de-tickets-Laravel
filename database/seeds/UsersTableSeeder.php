<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Admin
        User::create([
        	'name' => 'Ismael Haytam',
        	'email' => 'arcoders@admin.com',
        	'password' => bcrypt('laravel'),
        	'role' => 0
        ]);

        // Client
        User::create([
        	'name' => 'Fatima',
        	'email' => 'fatima@gmail.com',
        	'password' => bcrypt('laravel'),
        	'role' => 2
        ]);
    }
}
