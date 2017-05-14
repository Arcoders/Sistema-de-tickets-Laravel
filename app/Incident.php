<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    // validation
    public static $rules = [
        'category_id' => 'sometimes|exists:categories,id',
        'severity' => 'required|in:M,N,A',
        'title' => 'required|min:5',
        'description' => 'required|min:15'
    ];

    public static $messages = [
        'category_id.exists' => 'La catégorie sélectionnée n\'existe pas dans notre base de données.',
        'title.required' => 'Vous devez entrer un titre pour le plaidoyer.',
        'title.min' => 'Le titre doit avoir au moins 5 caractères.',
        'description.required' => 'Vous devez saisir une description de la question.',
        'description.min' => 'La description doit comporter au moins 15 caractères.'
    ];

    protected $appends = ['state'];

    // relationships

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function support()
    {
        return $this->belongsTo('App\User', 'support_id');
    }

    public function client()
    {
        return $this->belongsTo('App\User', 'client_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }


    // accessors

    public function getSeverityFullAttribute()
    {
    	switch ($this->severity) {
    		case 'M':
    			return 'Faible';

    		case 'N':
    			return 'Normal';

    		default:
    			return 'Haut';
    	}
    }

    public function getTitleShortAttribute()
    {
    	return mb_strimwidth($this->title, 0, 20, '...');
    }

    // category_name
    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;

        return 'General';
    }

    // support_name
    public function getSupportNameAttribute()
    {
        if ($this->support)
            return $this->support->name;

        return 'Unassigned';
    }

    public function getStateAttribute()
    {
        if ($this->active == 0)
            return 'Résolu';

        if ($this->support_id)
            return 'Assigné';

        return 'En attente';
    }
}
