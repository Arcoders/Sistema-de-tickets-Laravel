<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$rules = [
    		'message' => 'required|min:5|max:255'
    	];
    	$messages = [
    		'message.required' => 'Vous avez oublié d\'inclure un message.',
    		'message.min' => 'Entrez au moins 5 caractères.',
    		'message.max' => 'Entrez jusqu\'à 255 caractères.'
    	];

    	$this->validate($request, $rules, $messages);

    	$message = new Message();
    	$message->incident_id = $request->input('incident_id');
    	$message->message = $request->input('message');
    	$message->user_id = auth()->user()->id;
    	$message->save();

    	return back()->with('notification', 'Votre message a été envoyé.');
    }
}
