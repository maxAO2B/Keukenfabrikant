<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function add($post)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_posts()->where('post_id', $post)->count();

        if($isFavorite == 0)
        {
            $user->favorite_posts()->attach($post);
            return redirect()->back()->with('success', 'Succesvol aan je favorieten toegevoegd');
        }
        else 
        {
            $matchThese = ['post_id' => $post, 'user_id' => $user->id];
            DB::table('post_user')->where($matchThese)->delete();
            return redirect()->back()->with('success', 'Succesvol van je favorieten verwijderd');
        }
    }
}