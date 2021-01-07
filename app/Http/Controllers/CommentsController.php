<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\User;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        // $this->validate($request, array(
        //     'comment'   =>  'required|min:5|max:2000',
        // ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = auth()->user()->name;   
        $comment->email = auth()->user()->email;
        $comment->comment = $request->comment;  
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();

        Session::flash('success', 'comment was added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $comment = Comment::find($id);

        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->name !== $comment->name) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        $comment->delete();
        return redirect()->back()->with('success', 'Comment Deleted');
    }
}
