<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use DB;
use Auth;

class Leave_hrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('.hr.date_leave');
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
     * @param  \App\Leave $leave_hr
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave_hr
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave_hr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave ,$id)
    {   
      
          # code...
   // dd($request->all());
           $member = Leave::find($id);   
            
           $member->status_hr = $request->status_hr;
           $member->status_text2 = $request->status_text2;
          // dd($member);
           $member->save();
   
           return redirect('leave_hr');
      


    }

    public function update_no(Request $request, Leave $leave)
    {   
       
     
          // dd('safa');
           $member = Leave::find($id);   
            
           $member->status_hr = $request->status_hr;
           $member->status_text2 = $status_text;
           //dd($member);
           $member->save();
   
           return redirect('leave_hr');
      


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave_hr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
