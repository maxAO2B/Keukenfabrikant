<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Link;
use Illuminate\Support\Facades\DB;

class LinksController extends Controller
{
    public function index()
    {
        $links = DB::table('links')->get();
        return view('links.index')->with(compact('links'));
    }

    public function create()
    {
        return view('link.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bedrijfsnaam' => 'required' ,
            'link' => 'required',
        ]); 

        //create
        $link = new link;
        $link->bedrijfsnaam = $request->input('bedrijfsnaam');
        $link->link = $request->input('link');
        $link->save();

        return redirect('/')->with('success', 'link succesvol aangemaakt');
    }

    public function show()
    {
        $links = DB::table('links')->get();
        return view('links.index')->with(compact('links'));
    }
}
