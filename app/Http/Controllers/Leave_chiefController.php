<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use DB;
use Auth;

class Leave_chiefController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave $leave_chief
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave_chief)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave_chief  $leave_chief
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave){
    
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave_chief  $leave_chief
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave, $id)
    {
      
         $member = Leave::find($id);     

             $member->status_chief = $request->status_chief;
             $member->status_text1 = $request->status_text1;
            
            
            
           // dd($member);
             $member->save();
            
             return redirect('leave3');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave_chief
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave_chief)
    {
        //
    }
}
