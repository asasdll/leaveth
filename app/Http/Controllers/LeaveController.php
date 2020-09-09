<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Response;
use PDF;

class LeaveController extends Controller
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

    public function canvassch()
    {
            //dd('ddd');
        return view('chief.canvass');
    }

    
    public function log_out()
    {
        //dd('ddd');
        return view('layouts.logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf_leave($name)
    {

   //dd($name);
      $user_aaa = DB::table('newcompanies') //pdf_leave
      ->join('positions', 'newcompanies.newcode', '=','positions.codecom')
      ->join('leaves', 'positions.idchief', '=','leaves.head')
      ->where('status_hr', '!=' ,'Null')
      ->orderBy('leaves.id','ASC')
      ->where('lea_fname', 'like', '%'.$name.'%')
      ->where('idname',Auth::user()->id)
      
       ->get();
       //dd($user_aaa);
      $pdf = PDF::loadview('hr.pdf_leave',['user_aaa'=> $user_aaa]);
     return @$pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              //dd($request->all());
              $this->validate($request, [
                'affair'=> ['required', 'string', 'max:255'],
                'leave' => ['required', 'string', 'max:255'],
                'since' => ['required', 'string', 'max:255'],
                'date1' => ['required', 'string', 'max:255'],
                'date2' => ['required', 'string', 'max:255'],
                'da' => ['required', 'string', 'max:255'],

                
             ]);
    
             $member = new Leave;       
                 $member->idmember = Auth::user()->id;
                 $member->affair = $request->affair;
                 $member->head = $request->head;
                 $member->lea_fname = $request->lea_fname;
                 $member->lea_lname = $request->lea_lname;
                 $member->lea_niname = $request->lea_niname;
                 $member->leave = $request->leave;
                 $member->since = $request->since;
                 $member->date1 = $request->date1;
                 $member->date2 = $request->date2;
                 $member->da = $request->da;
                 $member->address = $request->address;
                 $member->tel = $request->tel;
                 $member->status_chief = $request->status_chief;
                 $member->status_text1 = $request->status_text1;
                 $member->status_hr = $request->status_hr;
                 $member->status_text2 = $request->status_text2;
                
                 if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image->move(public_path().'/img/file/',$image->getClientOriginalName());
                    $member->image=$image->getClientOriginalName();
                  //  $member = $img->getClientOriginalExtension();
                  //	$img->save();
                }
                
                 //dd($member);
                 $member->save();
             
             //dd($data);
             
             return redirect('leave3');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave, $id)
    {
    
          $chief = Leave::find($id);

          return view('chief.edit_upleave_chief ', compact('chief','id'));


        
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave, $id)
    {



          $position = DB::table('positions')

           ->get();
    
  
    
            $leave = DB::table('leaves_tops') // ประเภทการลา
            ->get();
         // dd('editl');
          $chief = Leave::find($id);
      //dd($chief);
             return view('personnel.editleave2', compact('chief','id'),['position'=> $position , 'leave'=> $leave]);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave, $id)
    {
     
        //dd($request->all());
        $this->validate($request, [
          'affair'=> ['required', 'string', 'max:255'],
          'leave' => ['required', 'string', 'max:255'],
          'since' => ['required', 'string', 'max:255'],
          'date1' => ['required', 'string', 'max:255'],
          'date2' => ['required', 'string', 'max:255'],
          'da' => ['required', 'string', 'max:255'],
          'tel' => ['required', 'numeric']
          
       ]);
       


       $member = Leave::find($id);     
           $member->idmember = Auth::user()->id;
           $member->affair = $request->affair;
           $member->head = $request->head;
           $member->leave = $request->leave;
           $member->since = $request->since;
           $member->date1 = $request->date1;
           $member->date2 = $request->date2;
           $member->da = $request->da;
           $member->address = $request->address;
           $member->tel = $request->tel;
          
           if($request->hasFile('image')){
              $image = $request->file('image');
              $image->move(public_path().'/img/file/',$image->getClientOriginalName());
              $member->image=$image->getClientOriginalName();
            //  $member = $img->getClientOriginalExtension();
            //	$img->save();
          }
          
          //dd($member);
           $member->save();
       
       //dd($data);
       
       return redirect('leave3');

      
         
    }



      

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
