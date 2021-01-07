<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
            return view('panel.posts')->with('posts', $posts);
    }

    public function search(Request $request)
    {
        $posts = Post::all();
        $posts = DB::select('select * from posts');

        $search = $request->input('pPost');
        $results = DB::table('posts')->where('title', 'LIKE', "%{$search}%")->get();
        return view('panel.posts', ['search' => $results], ['posts'=>$posts]);
    }
}
