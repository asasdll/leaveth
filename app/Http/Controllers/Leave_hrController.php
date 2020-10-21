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
    public function __construct()
    {
        $this->middleware('checkage');
    }


     
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
          $satus =  $request->status_hr;
        //dd($satus);
            if ($satus == 'อนุมัติ') {
                # code...
               /// dd('อนุมัติ');
           $save_data0 = DB::table('leaves')
           ->where('id',$id)
           ->get();
//dd($save_data0);
        $save_data1 = $save_data0[0]->idmember;
        $save_data2 = $save_data0[0]->leave;
        $save_data3 = $save_data0[0]->da;


    
        //dd($save_data0,$save_data1,$save_data2,$save_data3);
           $date_user = DB::table('add_date')
           ->where('id_user', $id)
           ->where('data_name','=', "$save_data2")
           ->get();
          // dd( $date_user);
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
          ->where('memberusers.iduser', '=' , $save_data1)
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

   // dd($code_user1,$code_user2,$code_user3);
          $date0 =  $code_user1 +  $date_user;
          $date1=  $code_user2 +  $date_user;
          $date2 =  $code_user3 +  $date_user;
          
          //dd($date0,$date1,$date2);

          $aa =  $save_data2;

          //dd($aa);
          if ($aa === 'ลาป่วย') {
              # code...e
              $sum2 = DB::table('sum_date')
              ->where('user_id', $save_data1)
              ->where('leave_name','=','ลาป่วย')
              ->get();
              //dd($sum2);
              $l_user2 = $save_data3;
              
              if (Count($sum2) == '1') {
                  
                  $l_user = $sum2[0]->leave_date_user;
                  $l_id = $sum2[0]->id;
                  $da2 = $sum2[0]->da;
                  $da01 = '1';
                  $da = $da2 + $da01;

                 
                  $l_user1 = $l_user + $l_user2;
                  //dd($l_user1);

                  $date_sp01 = $date1 - $l_user;
                  $date_sp02 = $date_sp01 - $l_user2;

                  $affected = DB::table('sum_date')
                              ->where('id',  $l_id)
                              ->update([ 'leave_date' => $code_user1,'leave_date_up' => $date_user,'leave_date_user' => $l_user1,
                              'leave_date_sum' =>  $date0 ,'da' => $da ,'leave_date_surplus' => $date_sp02]);

              }else {
                  # code...
                  $date_sp0 = $date0 - $l_user2;
                  DB::table('sum_date')->insert(
                      ['user_id' =>  $save_data1,'leave_name' =>$aa, 'leave_date' => $code_user1,
                      'leave_date_up' => $date_user,'da' => '1' ,'leave_date_user' => $l_user2,'leave_date_sum' =>  $date0 ,'leave_date_surplus' =>  $date_sp0]
                  );
              }

              
          }elseif ($aa === 'ลากิจ') {
              # code...
              //dd('ลากิจ5585');
              $sum2 = DB::table('sum_date')
              ->where('user_id', $save_data1)
              ->where('leave_name','=','ลากิจ')
              ->get();

             // $date_sp1 = $date1 - '1';
            
             //dd($sum2);
             $l_user2 = $save_data3;
             //dd($l_user2);
              if (Count($sum2) == '1') {
        //dd('aaa');
                  $l_user = $sum2[0]->leave_date_user;
                  $l_id = $sum2[0]->id;
                  $da2 = $sum2[0]->da;
                  $da01 = '1';
                  $da = $da2 + $da01;
                 // dd($l_id,$l_user);
               
                  $l_user1 = $l_user + $l_user2;
              //  dd(  $l_user);
                  $date_sp01 = $date1 - $l_user;
                 $date_sp02 = $date_sp01 - $l_user2;   
                //dd($date_sp02);
                  $affected = DB::table('sum_date')
                              ->where('id',  $l_id)
                              ->update([ 'leave_date' => $code_user2, 'leave_date_up' => $date_user,'leave_date_user' => $l_user1,
                                'leave_date_sum' =>  $date1 ,'da' => $da ,'leave_date_surplus' =>  $date_sp02]);

              }else {
                  # code...
                  $date_sp1 = $date1 - $l_user2;
                  DB::table('sum_date')->insert(
                      ['user_id' =>  $save_data1,'leave_name' => $aa, 'leave_date' => $code_user2,
                      'leave_date_up' => $date_user,'da' => '1','leave_date_user' => $l_user2 ,'leave_date_sum' =>  $date1 ,'leave_date_surplus' =>  $date_sp1]
                  );
              }

          }elseif ($aa === 'ลาพักร้อน') {
              # code...

              
              $sum2 = DB::table('sum_date')
              ->where('user_id', $save_data1)
              ->where('leave_name','=','ลาพักร้อน')
              ->get();

              
             // $date_sp2 = $date2 - '1';
              //dd($sum2);
              $l_user2 = $save_data3;
            //dd($l_user2);
              if (Count($sum2) == '1') {
                  
                  
                  $l_user = $sum2[0]->leave_date_user;
                  $da2 = $sum2[0]->da;
                  $l_id = $sum2[0]->id;
                 //dd($l_user01);
                 $da01 = '1';
                  $l_user1 = $l_user + $l_user2;
                    //dd($l_user1);
                    $date_sp01 = $date1 - $l_user;
                   $date_sp02 = $date_sp01 - $l_user2;
                 $da = $da2 + $da01;
              //dd($code_user3,$date_sp02,$date_user);
                  $affected = DB::table('sum_date')
                              ->where('id', $l_id)
                              ->update([ 'leave_date' => $code_user3,'leave_date_up' => $date_user,'leave_date_user' => $l_user1,
                              'leave_date_sum' =>  $date2 ,'da' => $da,'leave_date_surplus' => $date_sp02]);

              }else {
                  # code...
                  $date_sp2 = $date2 - $l_user2;
                  DB::table('sum_date')->insert(
                      ['user_id' =>  $save_data1,'leave_name' =>$aa, 'leave_date' => $code_user3,
                      'leave_date_up' => $date_user,'da' => '1','leave_date_user' => $l_user2 ,'leave_date_sum' =>  $date2 ,'leave_date_surplus' =>  $date_sp2]
                  );
              }

          }
          
            }
   
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