<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Memberuser;
use Illuminate\Http\Request;
use DB;
use Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('sss');
        $leave = DB::table('users') //กำลังรออนุมัติ  ของHR
        ->join('newcompanies', 'users.id', '=','newcompanies.idname')
        ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      
        //->orderBy('idchief','DESC')
        ->where('idname',Auth::user()->id)
        ->Paginate(30);
  
        //dd($leave);
        return view('hr.usersprofile', ['leave' => $leave]);
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
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo , $id)
    {
        $ticket = Memberuser::find($id);

  
      //dd($reg);
            return view('hr.show_personnel', compact('ticket','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
