<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //alleen standaardwaarden
    protected $table = 'links';
    public $primaryKey = 'id';
    public $timestamps = false;
}

function favorite_to_user() 
{
    return $this->belongsToMany('App\User')->withTimestamps();
}
