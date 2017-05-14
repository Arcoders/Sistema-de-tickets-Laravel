<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
			'name' => 'PC s1',
			'project_id' => 1
        ]);
        Category::create([
			'name' => 'Samsung s8',
			'project_id' => 1
        ]);
    }
}
