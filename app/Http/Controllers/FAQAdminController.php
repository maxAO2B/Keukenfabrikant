<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\FAQ;
use Illuminate\Support\Facades\DB;

class FAQAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::select('select * from faq');
        return view('panel.FAQ',['questions'=>$questions]);
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

        return redirect('/admin/FAQ')->with('success', 'FAQ Created');
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
        $question = FAQ::find($id);
        if(auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return view('FAQ.edit')->with('question', $question);
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
            'question' => 'required' ,
            'answer' => 'required'
        ]);    
        
        //update
        $faq = FAQ::find($id);
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();
        if(auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return redirect('/admin/FAQ')->with('success', 'FAQ Updated');
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
        $FAQ->delete();
        return redirect('/admin/FAQ/')->with('success', 'Vraag verwijderd');
    }
}
