<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class PagesController extends Controller
{
    //een limiet op het aantal keuken en nieuws posts op de homepage
    public function index() {
        $posts1 = Post::where('type', '=', 'news')->orderBy('id', 'asc')->limit(4)->get();
        $posts2 = Post::where('type', '=', 'keuken')->orderBy('id', 'asc')->limit(4)->get();
        return view('posts.index')->with('posts1', $posts1)->with('posts2', $posts2);
    }

    //Alleen een limiet op de news posts
    public function keukens() {
        $posts1 = Post::where('type', '=', 'news')->orderBy('id', 'asc')->limit(2)->get();
        $posts2 = Post::where('type', '=', 'keuken')->orderBy('id', 'asc')->get();
        return view('posts.index')->with('posts1', $posts1)->with('posts2', $posts2);
    }

    public function niews() {
        $posts1 = Post::where('type', '=', 'news')->orderBy('id', 'asc')->get();
        $posts2 = Post::where('type', '=', 'keuken')->orderBy('id', 'asc')->limit(2)->get();
        return view('posts.news')->with('posts1', $posts1)->with('posts2', $posts2);
    }

    public function overview() {
        $posts = Post::where('user_id', '=', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('pages.overview')->with('posts', $posts);
    }
}
