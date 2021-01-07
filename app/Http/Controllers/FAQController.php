<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\FAQ;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $FAQ = DB::table('faq')->get();
        return view('FAQ.index')->with(compact('FAQ'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FAQ.create');
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
            'question' => 'required' ,
            'answer' => 'required',
        ]); 

        //create
        $FAQ = new FAQ;
        $FAQ->question = $request->input('question');
        $FAQ->answer = $request->input('answer');
        $FAQ->save();

        return redirect('/')->with('success', 'FAQ Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FAQ = DB::table('faq')->get();
        return view('FAQ.index')->with(compact('FAQ'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $FAQ = FAQ::find($id);

        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->id !== $FAQ->user_id) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 

        // if($post->cover_image != 'default.jpg') {
        // Storage::delete('public/cover_images/' . $post->cover_image);
        // }
        $FAQ->delete();
        return redirect('/')->with('success', 'FAQ Deleted');
    }
}
