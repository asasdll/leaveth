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
            $status = $request->status_hr;
         $user_id = array($member);
         $id_arr = $user_id[0]->idmember;
         $id_name = $user_id[0]->leave;
 //dd( $member,$id_name);
                $add_date = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
                ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                ->join('sum_top', 'newcompanies.id', '=','sum_top.id_com')
                ->leftJoin('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                ->leftJoin('sum_add_date', 'memberusers.iduser', '=','sum_add_date.id_u')
                //->selectRaw(DB::raw("SUM(date_up) as add_date ,firstnamebem ,lastnamebem"))
                
                ->where('memberusers.iduser', '=' ,$id_arr)
                ->get();
               // dd($add_date);
                $p_sum_c =  $add_date[0]->personalleave_date;
                $v_sum_c =  $add_date[0]->vacationleave_date;
                $p_sum_up =  $add_date[0]->personal_date;
                $v_sum_up =  $add_date[0]->vacation_date;

                $sum_p_up = $p_sum_c + $p_sum_up;
                $sum_v_up = $v_sum_c + $v_sum_up;
                $start = '1';
                $sur_p =  $sum_p_up - $start;
                $sur_v =  $sum_v_up - $start;
//dd($sum_p_up,$sum_v_up);
                if ($status == 'อนุมัติ') {
                    $sum_date = DB::table('sum_date')
                    ->where('user_id', '=' ,$id_arr)
                    ->get();
                   // dd( $sum_date );
                        if (Count($sum_date) === 1) {
                           
                            $id = $sum_date[0]->id;
                            $sum_p = $sum_date[0]->per_date_sum;
                            $sum_u_p = $sum_date[0]->per_date_user;

                            $sum_v = $sum_date[0]->vac_date_sum;
                            $sum_u_v = $sum_date[0]->vac_date_user;
                         //   dd($id);
                           
                          //  dd($sum_null);
                            if ($id_name == 'ลากิจ') {
                                $sum_null = DB::table('sum_date')
                                ->where('user_id', '=' ,$id_arr)
                                ->where('per_date_sum', '!=', "")
                                ->get();

                                if (Count($sum_null) === 1) {
                                    $s_p = $sum_u_p + $start;
                                        $s_p_p =  $sum_p - $s_p;
                                        $affected = DB::table('sum_date')
                                        ->where('id', $id)
                                        ->update(['per_date_user' => $s_p ,'per_date_surplus' => $s_p_p]);
                                }else {
                                    # code...
                                    $affected = DB::table('sum_date')
                                        ->where('id', $id)
                                        ->update(['per_date_sum' => $sum_p_up ,'per_date_user' => $start ,'per_date_surplus' => $sur_p]);
                                }
                                # code...กก
                                //dd('sadas',$sum_null);
                              
                            }elseif ($id_name == 'ลาพักร้อน') {
                                
                                //dd('sdas');
                               $sum_null_v = DB::table('sum_date')
                               ->where('user_id', '=' ,$id_arr)
                               ->where('vac_date_sum', '!=', "")
                               ->get();
                               //dd($sum_null_v);
                               if (Count($sum_null_v) === 1) {
                                   # code...el
                                  // dd('555');
                                   $s_v = $sum_u_v + $start;
                                    $s_v_p =  $sum_v -  $s_v;
                                   // dd($s_v);
                                    $affect = DB::table('sum_date')
                                            ->where('id', $id)
                                            ->update(['vac_date_user' => $s_v ,'vac_date_surplus' => $s_v_p]);
                               }else {
                                   # code...
                                    $affect = DB::table('sum_date')
                                            ->where('id', $id)
                                            ->update(['vac_date_sum' => $sum_v_up,'vac_date_user' => $start ,'vac_date_surplus' => $sur_v]);
                               }
                                    
                            }else {
                                # code...
                            }



                        }else {
                            # code...
                            //dd( $sum_date ,'444');

                                if ($id_name == 'ลากิจ') {

                                    DB::table('sum_date')->insert(
                                        ['user_id' => $id_arr, 'per_date_sum' => $sum_p_up ,
                                        'per_date_user' => $start ,'per_date_surplus' => $sur_p]
                                    );
                                }elseif ($id_name == 'ลาพักร้อน') {

                                    DB::table('sum_date')->insert(
                                        ['user_id' => $id_arr, 'vac_date_sum' => $sum_v_up ,
                                        'vac_date_user' => $start ,'vac_date_surplus' => $sur_v]
                                    );

                                }else {
                                   
                                   
                                }
                        }
                   
                }else {
                    # code...
                    //dd('no');
                }
        // dd($add_date);

   
   
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