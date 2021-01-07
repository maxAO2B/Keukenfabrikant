<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function favorite_to_user() 
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function comments() 
    {
        return $this->hasMany('App\Comment');
    }
}
