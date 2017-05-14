<?php

use Illuminate\Database\Seeder;
use App\Incident;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Incident::create([
        	'title' => 'Première incidence',
        	'description' => 'Ce qui se passe est qu\'un problème a été trouvé sur mon ordinateur et il ne fonctionne pas',
        	'severity' => 'N',

        	'category_id' => 1,
        	'project_id' => 1,
        	'level_id' => 1,

        	'client_id' => 2,
        	'support_id' => 3
    	]);

    }
}
