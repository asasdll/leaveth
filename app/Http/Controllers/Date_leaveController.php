<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leaves_tops;
use Auth;
use DB;

class Date_leaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('.hr.date_leave_show');
    }


    public function sum(Request $request)
    {

        $user = request()->User();
        $search = $request->get('search');
            
                //dd($save_data,$date_user,Auth::user()->id);
         
            //dd($code_user);                          // ดึงข้อมูลพนักงาน/บริาษัท/ข้อมูลการลา

      
      //dd( $user);

      if ($user && $user->status == 'chief') {

       // dd('55');
       $code_user = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('positions', 'memberusers.code_herd', '=','positions.herd_code')
                ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                ->where('positions.idchief', '=' ,Auth::user()->id)
                ->where('firstnamebem','like', '%'.$search.'%')
                ->get();   

                return view('.chief.sum_date_ch' ,['code_user' =>$code_user]);

      }elseif ($user && $user->status == 'hr') {
          # code...
          $code_user = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('positions', 'memberusers.code_herd', '=','positions.herd_code')
                ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                ->where('firstnamebem','like', '%'.$search.'%')
                ->where('newcompanies.idname', '=' ,Auth::user()->id)
                //->where('firstnamebem','like', '%'.$search.'%')
                ->get();   

               // dd($code_user);
            return view('.hr.sum_data_hr' ,['code_user' =>$code_user]);
      }else {
          # code...
          $save_data = DB::table('sum_date')
                        ->where('user_id',Auth::user()->id)
                        ->get();  
           // dd($save_data);                       
         return view('.personnel.sum_date_per',['save_data' =>$save_data]);

      }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       

        $user = request()->User();
        if ($user && $user->status == 'hr') {

                $id_leave = DB::table('leaves_tops')
                ->where('id_company',Auth::user()->id)
                ->groupBy('id_company')
                ->get();
                 if (count($id_leave) === 1) {
                     # code...e
                    // dd($id_leave);
                     return view('.hr.date_leave_show',['id_leave' => $id_leave]);
                 
                    }else {
        
                    //dd($id_leave);
                    return view('.hr.date_leave');
                 }
           
              }else{
             //
                    return redirect('/home');
              }

       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $this->validate($request, [
            'sickleave_date'=> ['required','numeric'],
            'personalleave_date' => ['required','numeric'],
            'vacationleave_date' => ['required','numeric'],
            
            
         ]);
         $id_company =  Auth::user()->id;
         //dd($id_company);
         $member = new leaves_tops;       
             $member->id_company = Auth::user()->id;
             $member->sickleave = 'ลาป่วย';
             $member->sickleave_date = $request->sickleave_date;
             $member->personalleave = 'ลากิจ';
             $member->personalleave_date = $request->personalleave_date;
             $member->vacationleave = 'ลาพักร้อน';
             $member->vacationleave_date = $request->vacationleave_date;

 
            
            // dd($member);
            $member->save();

            $name_l1 = $request->sickleave_date;
            $name_l2 = $request->personalleave_date;
            $name_l3 = $request->vacationleave_date;

            $leave_user = DB::table('users')
                    ->join('memberusers', 'users.id', '=','memberusers.iduser')
                    ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                    ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                    ->where('newcompanies.idname', '=' , Auth::user()->id)
                    ->get();

           //dd( $leave_user);

            if (Count($leave_user) >= '1') {
                # code...   
                //dd($code_user);

                            $leave_user = DB::table('users')
                                    ->join('memberusers', 'users.id', '=','memberusers.iduser')
                                    ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                                    ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                                    ->where('newcompanies.idname', '=' , Auth::user()->id)
                                    ->where('sum_date.leave_name', '=' , 'ลาป่วย')
                                    ->update([ 'leave_date' => $name_l1]);

                            $leave_user1 = DB::table('users')
                                    ->join('memberusers', 'users.id', '=','memberusers.iduser')
                                    ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                                    ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                                    ->where('newcompanies.idname', '=' , Auth::user()->id)
                                    ->where('sum_date.leave_name', '=' , 'ลากิจ')
                                    ->update([ 'leave_date' => $name_l2]);

                            $leave_user2 = DB::table('users')
                                    ->join('memberusers', 'users.id', '=','memberusers.iduser')
                                    ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                                    ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                                    ->where('newcompanies.idname', '=' , Auth::user()->id)
                                    ->where('sum_date.leave_name', '=' , 'ลาพักร้อน')
                                    ->update([ 'leave_date' => $name_l3]);
                            # code...
                        
            
            }


    
          
                     // dd('555');

                     $leave_user03 = DB::table('users')
                                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                                        ->join('add_date', 'memberusers.iduser', '=','add_date.id_user')
                                        ->where('newcompanies.idname', '=' , Auth::user()->id)
                                        ->where('data_name', '=' , 'ลาป่วย')
                                        ->get();
                    

                            if (Count($leave_user03) >= '1') {
                                        # code...
                                $add_id = $leave_user03[0]->iduser;
                                $add_date = $leave_user03[0]->date_up;
                                $sum_all  = $name_l1 + $add_date; 
                                
                           
                                 $leave_user2 = DB::table('sum_date')
                                                ->where('user_id', '=' ,  $add_id)
                                                ->where('leave_name', '=' , 'ลาป่วย')
                                               ->get();
                                        if (Count($leave_user2) >= '1') {
                                                   # code...
                                                   $date_surplus = $leave_user2[0]->leave_date_user;

                                               }else {
                                                  $date_surplus = '0';
                                               }
                              //  dd($leave_user02);
                                
                                $sum_all_dom  = $sum_all - $date_surplus; 



                                        $leave_user02 = DB::table('sum_date')
                                                ->where('user_id', '=' ,  $add_id)
                                                ->where('leave_name', '=' , 'ลาป่วย')
                                                ->update([ 'leave_date_up' => $add_date ,'leave_date_sum' =>$sum_all,'leave_date_surplus' => $sum_all_dom]);

                                        

                                    }  


                            $leave_user03 = DB::table('users')
                                    ->join('memberusers', 'users.id', '=','memberusers.iduser')
                                    ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                                    ->join('add_date', 'memberusers.iduser', '=','add_date.id_user')
                                    ->where('newcompanies.idname', '=' , Auth::user()->id)
                                    ->where('data_name', '=' , 'ลากิจ')
                                    ->get();
                

                        if (Count($leave_user03) >= '1') {
                                    # code...
                            $add_id = $leave_user03[0]->iduser;
                            $add_date = $leave_user03[0]->date_up;
                            $sum_all  = $name_l2 + $add_date; 
                            
                       
                             $leave_user2 = DB::table('sum_date')
                                            ->where('user_id', '=' ,  $add_id)
                                            ->where('leave_name', '=' , 'ลากิจ')
                                           ->get();
                                    if (Count($leave_user2) >= '1') {
                                               # code...
                                               $date_surplus = $leave_user2[0]->leave_date_user;

                                           }else {
                                              $date_surplus = '0';
                                           }
                          //  dd($leave_user02);
                            
                            $sum_all_dom  = $sum_all - $date_surplus; 



                                    $leave_user02 = DB::table('sum_date')
                                            ->where('user_id', '=' ,  $add_id)
                                            ->where('leave_name', '=' , 'ลากิจ')
                                            ->update([ 'leave_date_up' => $add_date ,'leave_date_sum' =>$sum_all,'leave_date_surplus' => $sum_all_dom]);

                                    

                                }


                    $leave_user03 = DB::table('users')
                                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                                ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                                ->join('add_date', 'memberusers.iduser', '=','add_date.id_user')
                                ->where('newcompanies.idname', '=' , Auth::user()->id)
                                ->where('data_name', '=' , 'ลาพักร้อน')
                                ->get();
            

                    if (Count($leave_user03) >= '1') {
                                # code...
                        $add_id = $leave_user03[0]->iduser;
                        $add_date = $leave_user03[0]->date_up;
                        $sum_all  = $name_l3 + $add_date; 
                        
                   
                         $leave_user2 = DB::table('sum_date')
                                        ->where('user_id', '=' ,  $add_id)
                                        ->where('leave_name', '=' , 'ลาพักร้อน')
                                       ->get();
                                if (Count($leave_user2) >= '1') {
                                           # code...
                                           $date_surplus = $leave_user2[0]->leave_date_user;

                                       }else {
                                          $date_surplus = '0';
                                       }
                      //  dd($leave_user02);
                        
                        $sum_all_dom  = $sum_all - $date_surplus; 



                                $leave_user02 = DB::table('sum_date')
                                        ->where('user_id', '=' ,  $add_id)
                                        ->where('leave_name', '=' , 'ลาพักร้อน')
                                        ->update([ 'leave_date_up' => $add_date ,'leave_date_sum' =>$sum_all,'leave_date_surplus' => $sum_all_dom]);

                                

                            }

                     
          //  dd('ไม่มี');
             return redirect('date_leave')->with('success', 'บันทึกข้อมูลเรียบร้อย');
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
        $id_com = DB::table('leaves_tops')
        ->where('id_company',$id)
        ->groupBy('id_company')
        ->get();
        //dd($id_com);

        return view('.hr.date_leave_edit', ['id_com'=> $id_com]);
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
       //dd($request->all());

        $id_com = DB::table('leaves_tops')
        ->where('id_company',$id)
        ->groupBy('id_company')
        ->get();
//dd($id_com);
        $id_com2 = $id_com[0]->id;
        //dd($id_com2);
        $id =  $id_com2;
        
        $member =  leaves_tops::find($id);
        //dd( $member);
        $member->sickleave_date = $request->sickleave_date;
        $member->personalleave_date = $request->personalleave_date;
        $member->vacationleave_date = $request->vacationleave_date;

    
        $member->save();

        $name_l1 = $request->sickleave_date;
        $name_l2 = $request->personalleave_date;
        $name_l3 = $request->vacationleave_date;

        $leave_user = DB::table('users')
        ->join('memberusers', 'users.id', '=','memberusers.iduser')
        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
        ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
        ->where('newcompanies.idname', '=' , Auth::user()->id)
        ->get();

//dd( $leave_user);

if (Count($leave_user) >= '1') {
    # code...   
    //dd($code_user);

                $leave_user = DB::table('users')
                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                        ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                        ->where('newcompanies.idname', '=' , Auth::user()->id)
                        ->where('sum_date.leave_name', '=' , 'ลาป่วย')
                        ->update([ 'leave_date' => $name_l1]);

                $leave_user1 = DB::table('users')
                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                        ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                        ->where('newcompanies.idname', '=' , Auth::user()->id)
                        ->where('sum_date.leave_name', '=' , 'ลากิจ')
                        ->update([ 'leave_date' => $name_l2]);

                $leave_user2 = DB::table('users')
                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                        ->join('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                        ->where('newcompanies.idname', '=' , Auth::user()->id)
                        ->where('sum_date.leave_name', '=' , 'ลาพักร้อน')
                        ->update([ 'leave_date' => $name_l3]);
                # code...
            

}




         // dd('555');

         $leave_user03 = DB::table('users')
                            ->join('memberusers', 'users.id', '=','memberusers.iduser')
                            ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                            ->join('add_date', 'memberusers.iduser', '=','add_date.id_user')
                            ->where('newcompanies.idname', '=' , Auth::user()->id)
                            ->where('data_name', '=' , 'ลาป่วย')
                            ->get();
        

                if (Count($leave_user03) >= '1') {
                            # code...
                    $add_id = $leave_user03[0]->iduser;
                    $add_date = $leave_user03[0]->date_up;
                    $sum_all  = $name_l1 + $add_date; 
                    
               
                     $leave_user2 = DB::table('sum_date')
                                    ->where('user_id', '=' ,  $add_id)
                                    ->where('leave_name', '=' , 'ลาป่วย')
                                   ->get();
                            if (Count($leave_user2) >= '1') {
                                       # code...
                                       $date_surplus = $leave_user2[0]->leave_date_user;

                                   }else {
                                      $date_surplus = '0';
                                   }
                  //  dd($leave_user02);
                    
                    $sum_all_dom  = $sum_all - $date_surplus; 



                            $leave_user02 = DB::table('sum_date')
                                    ->where('user_id', '=' ,  $add_id)
                                    ->where('leave_name', '=' , 'ลาป่วย')
                                    ->update([ 'leave_date_up' => $add_date ,'leave_date_sum' =>$sum_all,'leave_date_surplus' => $sum_all_dom]);

                            

                        }  


                $leave_user03 = DB::table('users')
                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                        ->join('add_date', 'memberusers.iduser', '=','add_date.id_user')
                        ->where('newcompanies.idname', '=' , Auth::user()->id)
                        ->where('data_name', '=' , 'ลากิจ')
                        ->get();
    

            if (Count($leave_user03) >= '1') {
                        # code...
                $add_id = $leave_user03[0]->iduser;
                $add_date = $leave_user03[0]->date_up;
                $sum_all  = $name_l2 + $add_date; 
                
           
                 $leave_user2 = DB::table('sum_date')
                                ->where('user_id', '=' ,  $add_id)
                                ->where('leave_name', '=' , 'ลากิจ')
                               ->get();
                        if (Count($leave_user2) >= '1') {
                                   # code...
                                   $date_surplus = $leave_user2[0]->leave_date_user;

                               }else {
                                  $date_surplus = '0';
                               }
              //  dd($leave_user02);
                
                $sum_all_dom  = $sum_all - $date_surplus; 



                        $leave_user02 = DB::table('sum_date')
                                ->where('user_id', '=' ,  $add_id)
                                ->where('leave_name', '=' , 'ลากิจ')
                                ->update([ 'leave_date_up' => $add_date ,'leave_date_sum' =>$sum_all,'leave_date_surplus' => $sum_all_dom]);

                        

                    }


        $leave_user03 = DB::table('users')
                    ->join('memberusers', 'users.id', '=','memberusers.iduser')
                    ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                    ->join('add_date', 'memberusers.iduser', '=','add_date.id_user')
                    ->where('newcompanies.idname', '=' , Auth::user()->id)
                    ->where('data_name', '=' , 'ลาพักร้อน')
                    ->get();


        if (Count($leave_user03) >= '1') {
                    # code...
            $add_id = $leave_user03[0]->iduser;
            $add_date = $leave_user03[0]->date_up;
            $sum_all  = $name_l3 + $add_date; 
            
       
             $leave_user2 = DB::table('sum_date')
                            ->where('user_id', '=' ,  $add_id)
                            ->where('leave_name', '=' , 'ลาพักร้อน')
                           ->get();
                    if (Count($leave_user2) >= '1') {
                               # code...
                               $date_surplus = $leave_user2[0]->leave_date_user;

                           }else {
                              $date_surplus = '0';
                           }
          //  dd($leave_user02);
            
            $sum_all_dom  = $sum_all - $date_surplus; 



                    $leave_user02 = DB::table('sum_date')
                            ->where('user_id', '=' ,  $add_id)
                            ->where('leave_name', '=' , 'ลาพักร้อน')
                            ->update([ 'leave_date_up' => $add_date ,'leave_date_sum' =>$sum_all,'leave_date_surplus' => $sum_all_dom]);

                    

                }

        return redirect('date_leave')->with('success', 'บันทึกข้อมูลเรียบร้อย');
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