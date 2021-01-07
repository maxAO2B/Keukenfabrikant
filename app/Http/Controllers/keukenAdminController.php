<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keukenfabrikant;
use App\User;
use Auth;
use DB;

class keukenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bedrijven = DB::select('select * from keukenfabrikant');
        return view('panel.keukenzaken')->with('bedrijven', $bedrijven);
    }

    public function search(Request $request)
    {
        $bedrijven = DB::select('select * from keukenfabrikant');

        $search = $request->input('pBedrijf');
        $results = DB::table('keukenfabrikant')->where('Bedrijfsnaam', 'LIKE', "%{$search}%")->get();
        return view('panel.keukenzaken', ['search' => $results], ['bedrijven'=>$bedrijven]);
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
        //
    }
}
