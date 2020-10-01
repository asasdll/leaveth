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

       $image_user = DB::table('users')
       ->join('newcompanies', 'users.id', '=','newcompanies.idname')
       ->where('idname',Auth::user()->id)
       ->get();
       //dd($user_aaa);
      $pdf = PDF::loadview('hr.pdf_leave',['image_user'=> $image_user ,'user_aaa'=> $user_aaa]);
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
        $user = request()->User();
        if ($user && $user->status === 'chief') {
            $namdate1 = request()->from1;
       //dd($namdate1);
        if ($namdate1 != null) {
            # code...el
            $this->validate($request, [
                'image'=> ['required','mimes:jpg,png,jpeg,gif,svg'],

                
             ]);

            $date1 = request()->from1;
            $date2 = request()->to1;
            $da = request()->daydiff1;
            //dd('ลาป่วย',$date1,$date2,$da);
        }else {
            # code...
            $date1 = request()->from2;
            $date2 = request()->to2;
            $da = request()->daydiff2;
            //dd('ลากิจ/พักร้อน',$date1,$date2,$da,$request->all());
        }
       // dd($request->all());
              //dd($request->all());
              $this->validate($request, [
                'affair'=> ['required', 'string', 'max:255'],
                'leave' => ['required', 'string', 'max:255'],
                'since' => ['required', 'string', 'max:255'],
                //'date1' => ['required', 'string', 'max:255'],
                //'date2' => ['required', 'string', 'max:255'],
                //'da' => ['required', 'string', 'max:255'],

                
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
                 $member->date1 = $date1;
                 $member->date2 = $date2;
                 $member->da = $da;
                 $member->address = $request->address;
                 $member->tel = $request->tel;
                 $member->status_chief = 'อนุมัติ';
                 $member->status_text1 = 'อนุมัติ';
                 /*$member->status_hr = $request->status_hr;
                 $member->status_text2 = $request->status_text2;*/
                
                 if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image->move(public_path().'/img/file/',$image->getClientOriginalName());
                    $member->image=$image->getClientOriginalName();
                  //  $member = $img->getClientOriginalExtension();
                  //	$img->save();
                }
        }else {
            # code...
            $namdate1 = request()->from1;
            //dd($namdate1);
             if ($namdate1 != null) {
                 # code...el
                 $this->validate($request, [
                     'image'=> ['required','mimes:jpg,png,jpeg,gif,svg'],
     
                     
                  ]);
     
                 $date1 = request()->from1;
                 $date2 = request()->to1;
                 $da = request()->daydiff1;
                 //dd('ลาป่วย',$date1,$date2,$da);
             }else {
                 # code...
                 $date1 = request()->from2;
                 $date2 = request()->to2;
                 $da = request()->daydiff2;
                 //dd('ลากิจ/พักร้อน',$date1,$date2,$da,$request->all());
             }
            // dd($request->all());
                   //dd($request->all());
                   $this->validate($request, [
                     'affair'=> ['required', 'string', 'max:255'],
                     'leave' => ['required', 'string', 'max:255'],
                     'since' => ['required', 'string', 'max:255'],
                     //'date1' => ['required', 'string', 'max:255'],
                     //'date2' => ['required', 'string', 'max:255'],
                     //'da' => ['required', 'string', 'max:255'],
     
                     
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
                      $member->date1 = $date1;
                      $member->date2 = $date2;
                      $member->da = $da;
                      $member->address = $request->address;
                      $member->tel = $request->tel;
                      /*$member->status_chief = $request->status_chief;
                      $member->status_text1 = $request->status_text1;
                      $member->status_hr = $request->status_hr;
                      $member->status_text2 = $request->status_text2;*/
                     
                      if($request->hasFile('image')){
                         $image = $request->file('image');
                         $image->move(public_path().'/img/file/',$image->getClientOriginalName());
                         $member->image=$image->getClientOriginalName();
                       //  $member = $img->getClientOriginalExtension();
                       //	$img->save();
                     }
        }
        
                
                 //dd($member);
                 $member->save();

                 $date_user = DB::table('add_date')
                 ->where('id_user',Auth::user()->id)
                 ->get();
                 if (Count($date_user) == '1') {
                     # code...
                     $date_user = $date_user[0]->date_up;
                 }else {
                     # code...
                     $date_user = '0';
                 }

                $code_user = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                ->join('leaves_tops', 'newcompanies.idname', '=','leaves_tops.id_company')
                ->where('memberusers.iduser', '=' ,Auth::user()->id)
                ->get();
        //dd($code_user);

       
            


                if (Count($code_user) == '1') {
                    $code_user1 = $code_user[0]->sickleave_date;
                    $code_user2 = $code_user[0]->personalleave_date;
                    $code_user3 = $code_user[0]->vacationleave_date;
                  
                   

                }else {
                    
                    $code_user1 = '0';
                    $code_user2 = '0';
                    $code_user3 = '0';
                }
                
                $date0 =  $code_user1 +  $date_user;
                $date1=  $code_user2 +  $date_user;
                $date2 =  $code_user3 +  $date_user;
                


              // dd($request->all() ,$date0,$date1,$date2,$date4);

                

                /*$sum2 = DB::table('sum_date')
                    ->where('user_id',Auth::user()->id)
                    ->where('leave_name','=','ลาป่วย')
                    ->get();*/


                $aa = $request->leave;

                if ($aa === 'ลาป่วย') {
                    # code...e
                    $sum2 = DB::table('sum_date')
                    ->where('user_id',Auth::user()->id)
                    ->where('leave_name','=','ลาป่วย')
                    ->get();
                    //dd($sum2);
                    $date_sp0 = $date0 - '1';
                    if (Count($sum2) == '1') {
                        
                        $l_user = $sum2[0]->leave_date_user;
                        $l_id = $sum2[0]->id;
                        $l_user00 = $sum2[0]->leave_date_surplus;
                      //  dd($l_id);
                        $l_user2 = '1';
                        $l_user1 = $l_user + $l_user2;
                        //dd($l_user1);
                        $date_su0 = $l_user00 - '1';

                        $affected = DB::table('sum_date')
                                    ->where('id', $l_id)
                                    ->update(['leave_date_user' => $l_user1,'leave_date_surplus' => $date_su0]);

                    }else {
                        # code...
                        DB::table('sum_date')->insert(
                            ['user_id' => Auth::user()->id,'leave_name' => $request->leave, 'leave_date' => $code_user1,
                            'leave_date_up' => $date_user,'leave_date_user' => '1','leave_date_sum' =>  $date0 ,'leave_date_surplus' =>  $date_sp0]
                        );
                    }

                    
                }elseif ($aa === 'ลากิจ') {
                    # code...
                    $sum2 = DB::table('sum_date')
                    ->where('user_id',Auth::user()->id)
                    ->where('leave_name','=','ลากิจ')
                    ->get();

                    $date_sp1 = $date1 - '1';
                            
                    //dd($sum2);
                    if (Count($sum2) == '1') {

                        $l_user = $sum2[0]->leave_date_user;
                        $l_id = $sum2[0]->id;
                        $l_user01 = $sum2[0]->leave_date_surplus;
                      //  dd($l_id);
                        $l_user2 = '1';
                        $l_user1 = $l_user + $l_user2;
                        $date_su1 = $l_user01 - '1';
                        //dd($l_user1);
                        $affected = DB::table('sum_date')
                                    ->where('id', $l_id)
                                    ->update(['leave_date_user' => $l_user1,'leave_date_surplus' => $date_su1]);

                    }else {
                        # code...
                        DB::table('sum_date')->insert(
                            ['user_id' => Auth::user()->id,'leave_name' => $request->leave, 'leave_date' => $code_user2,
                            'leave_date_up' => $date_user,'leave_date_user' => '1' ,'leave_date_sum' =>  $date1 ,'leave_date_surplus' =>  $date_sp1]
                        );
                    }

                }elseif ($aa === 'ลาพักร้อน') {
                    # code...
                    $sum2 = DB::table('sum_date')
                    ->where('user_id',Auth::user()->id)
                    ->where('leave_name','=','ลาพักร้อน')
                    ->get();

                    
                    $date_sp2 = $date2 - '1';
                    //dd($sum2);
                    if (Count($sum2) == '1') {
                        
                        
                        $l_user = $sum2[0]->leave_date_user;
                        $l_id = $sum2[0]->id;
                        $l_user02 = $sum2[0]->leave_date_surplus;
                       //dd($l_user01);
                        $l_user2 = '1';
                        $l_user1 = $l_user + $l_user2;
                          //dd($l_user1);
                        $date_su2 = $l_user02 - '1';
                        $affected = DB::table('sum_date')
                                    ->where('id', $l_id)
                                    ->update(['leave_date_user' => $l_user1,'leave_date_surplus' => $date_su2]);

                    }else {
                        # code...
                        DB::table('sum_date')->insert(
                            ['user_id' => Auth::user()->id,'leave_name' => $request->leave, 'leave_date' => $code_user3,
                            'leave_date_up' => $date_user,'leave_date_user' => '1' ,'leave_date_sum' =>  $date2 ,'leave_date_surplus' =>  $date_sp2]
                        );
                    }

                }
             
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
          
          
       ]);
       $namdate1 = request()->from1;
       //dd($namdate1);
        if ($namdate1 != null) {
            # code...el
            $date1 = request()->from1;
            $date2 = request()->to1;
            $da = request()->daydiff1;
            //dd('ลาป่วย',$date1,$date2,$da);
        }else {
            # code...
            $date1 = request()->from2;
            $date2 = request()->to2;
            $da = request()->daydiff2;
            //dd('ลากิจ/พักร้อน',$date1,$date2,$da,$request->all());
        }


       $member = Leave::find($id);     
           $member->idmember = Auth::user()->id;
           $member->affair = $request->affair;
           $member->head = $request->head;
           $member->leave = $request->leave;
           $member->since = $request->since;
           $member->date1 = $date1;
           $member->date2 = $date2;
           $member->da = $da;
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
