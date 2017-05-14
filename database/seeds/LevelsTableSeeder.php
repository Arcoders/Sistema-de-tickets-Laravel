<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([ // 1
        	'name' => 'Support par chat',
        	'project_id' => 1
    	]);
    }
}
