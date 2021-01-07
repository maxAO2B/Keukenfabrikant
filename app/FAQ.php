<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    //alleen standaardwaarden
    protected $table = 'FAQ';
    public $primaryKey = 'id';
    public $timestamps = true;
}

function favorite_to_user() 
{
    return $this->belongsToMany('App\User')->withTimestamps();
}
