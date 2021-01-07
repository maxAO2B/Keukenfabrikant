<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Storage;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users');
        return view('panel.users',['users'=>$users]);
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

    public function search(Request $request)
    {
        $users = DB::select('select * from users');

        $search = $request->input('pUser');
        $results = DB::table('users')->where('name', 'LIKE', "%{$search}%")->orWhere('email', 'LIKE', "%{$search}%")->get();
        return view('panel.users', ['search' => $results], ['users'=>$users]);

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
        $user = User::find($id);
        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->id !== $user->id) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return view('panel.editUser')->with('user', $user);
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
            'email' => 'required'
        ]);    
        
        //update
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('role') != 'empty'){
            $user->role = $request->input('role');
        }
        if($request->input('blocked') != 'empty'){
            $user->blocked = $request->input('blocked');
        }
        $user->save();
        if(auth()->user()->role == 'admin') {} 
        else if(auth()->user()->id !== $user->id) {
            return redirect('/')->with('error', 'Unauthorized page');
        } 
        return redirect('/admin/users')->with('success', 'User Updated');
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

        // if($post->cover_image != 'default.jpg') {
        // Storage::delete('public/cover_images/' . $post->cover_image);
        // }
        $user->delete();
        return redirect('/admin/users')->with('success', 'User Deleted');
    }
}
