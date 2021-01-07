<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Storage;



class PostsAdminController extends Controller
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
        return view('panel.makePost');
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
            'title' => 'required' ,
            'body' => 'required',
            'type' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);   

        if($request->hasFile('cover_image')) {
            //get file with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get only file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get only extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //create original filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }

        //create
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->type = $request->input('type');
        $post->user_id = auth()->user()->id;      
        $post->user_role = auth()->user()->role;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/admin/posts')->with('success', 'Post Created');
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
        $post = Post::find($id);
        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return view('panel.editPost')->with('post', $post);
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
            'title' => 'required' ,
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);    

         //file
         if($request->hasFile('cover_image')) {
            //get file with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get only file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get only extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //create original filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 
        
        //update
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->input('type') != 'empty'){
            $posts->type = $request->input('type');
        }
        if($request->hasFile('cover_image')){
            if($post->cover_image != 'default.jpg') {
                Storage::delete('public/cover_images/' . $post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        return redirect('/admin/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
