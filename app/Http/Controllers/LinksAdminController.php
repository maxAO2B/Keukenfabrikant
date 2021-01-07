<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Link;
use Illuminate\Support\Facades\DB;

class LinksAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = DB::select('select * from links');
        return view('panel.links',['links'=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bedrijfsnaam' => 'required' ,
            'link' => 'required',
        ]); 

        //create
        $link = new Link;
        $link->bedrijfsnaam = $request->input('bedrijfsnaam');
        $link->link = $request->input('link');
        $link->save();

        return redirect('/admin/links')->with('success', 'link aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $links = DB::table('links')->get();
        return view('links.index')->with(compact('links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $links = Link::find($id);
        if(auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return view('links.edit')->with('Link', $links);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $this->validate($request, [
            'bedrijfsnaam' => 'required' ,
            'link' => 'required'
        ]);    
        
        //update
        $links = Link::find($id);
        $links->bedrijfsnaam = $request->input('bedrijfsnaam');
        $links->link = $request->input('link');
        $links->save();
        if(auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return redirect('/admin/links')->with('success', 'link bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $links = Link::find($id);

        if(auth()->user()->role == 'admin') {} 
        $links->delete();
        return redirect('/admin/links')->with('success', 'link verwijderd');
    }
}
