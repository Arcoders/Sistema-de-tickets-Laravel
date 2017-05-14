<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Project;
use App\ProjectUser;
use App\Level;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::where('role', 1)->get();
    	return view('admin.users.index')->with(compact('users'));
    }

    public function store(Request $request)
    {
    	$rules = [
    		'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
    	];
    	$messages = [
    		'name.required' => 'Vous devez entrer le nom d\'utilisateur.',
    		'name.max' => 'Le nom est trop long.',
    		'email.required' => 'Il est essentiel d\'entrer dans l\'e-mail de l\'utilisateur.',
    		'email.email' => 'L\'e-mail saisie est invalide.',
    		'email.max' => 'L\'e-mail est trop long.',
    		'email.unique' => 'Cet email est déjà utilisé.',
    		'password.required' => 'Vous avez oublié d\'entrer un mot de passe.',
    		'password.min' => 'Le mot de passe doit comporter au moins 6 caractères.'
    	];
    	$this->validate($request, $rules, $messages);

    	$user = new User();
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->password = bcrypt($request->input('password'));
        $user->selected_project_id = '1';
    	$user->role = 1;
    	$user->save();

    	return back()->with('notification', 'L\'utilisateur enregistré avec succès.');
    }

    public function edit($id)
    {
    	$user = User::find($id);
        $projects = Project::all();
        $levels = Level::all();

        $projects_user = ProjectUser::where('user_id', $user->id)->get();

    	return view('admin.users.edit')->with(compact('user', 'projects', 'projects_user', 'levels'));
    }

    public function update($id, Request $request)
    {
    	$rules = [
    		'name' => 'required|max:255',
            'password' => 'min:6'
    	];
    	$messages = [
    		'name.required' => 'Vous devez entrer le nom d\'utilisateur.',
    		'name.max' => 'Le nom est trop long.',
    		'password.min' => 'Le mot de passe doit comporter au moins 6 caractères.'
    	];
    	$this->validate($request, $rules, $messages);

    	$user = User::find($id);
    	$user->name = $request->input('name');

    	$password = $request->input('password');
    	if ($password)
    		$user->password = bcrypt($password);

    	$user->save();

    	return back()->with('notification', 'l\'utilisateur a été modifié avec succès.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('notification', 'L\'utilisateur a désabonné correctement.');
    }
}
