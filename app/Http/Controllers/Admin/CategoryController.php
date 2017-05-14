<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	], [
    		'name.required' => 'Vous devez saisir un nom pour la catégorie.'
    	]);

    	Category::create($request->all());

    	return back();
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Vous devez saisir un nom pour la catégorie.'
        ]);

        $category_id = $request->input('category_id');

        $category = Category::find($category_id);
        $category->name = $request->input('name');
        $category->save();

        return back();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
