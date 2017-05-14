<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public static $rules = [
        'name' => 'required',
        // 'description' => '',
        'start' => 'date'
    ];

    public static $messages = [
        'name.required' => 'Vous devez saisir un nom pour la spécialité.',
        'start.date' => 'La date n\'a pas un format approprié.'
    ];

    protected $fillable = [
        'name', 'description', 'start'
    ];

    // relationships

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Level');
    }

    // accessors

    public function getFirstLevelIdAttribute()
    {
        return $this->levels->first()->id;
    }


}
