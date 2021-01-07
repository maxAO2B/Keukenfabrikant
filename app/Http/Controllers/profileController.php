<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.profile');
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $posts = Auth::user()->favorite_posts;
        $author = DB::table('users')
        ->rightJoin('posts','posts.user_id','=','users.id')
        ->select('users.name', 'users.role')
       ->get();
        return view('pages.profile')->with(compact('user', 'posts', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->id !== $user->id) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return view('pages.editProfile')->with('user', $user);
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
            'name' => 'required' ,
            'email' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);    

        if($request->hasFile('avatar')) {
            //get file with extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            //get only file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get only extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //create original filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store image
            $path = $request->file('avatar')->storeAs('public/uploads/avatars', $fileNameToStore);
        } 
        
        //update
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->hasFile('avatar')){
            if($user->avatar != 'nopfp.jpg') {
                // Storage::delete('public/uploads/avatars/' . $user->avatar);
            }
            $user->avatar = $fileNameToStore;
        }
        $user->save();
        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->id !== $user->id) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return redirect('/')->with('success', 'Account Bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->id !== $user->id) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 

        if($user->avatar != 'nopfp.jpg') {
        Storage::delete('public/uploads/avatars/' . $user->avatar);
        }

        $user->delete();
        return redirect('/')->with('success', 'Account Verwijderd');
    }
}
