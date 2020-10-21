<?php

namespace App\Http\Controllers;

use App\Add_date;
use Auth;
use DB;
use Illuminate\Http\Request;

class Add_dateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {

        $user = request()->User();
            if ($user && $user->status == 'chief') {

                $search = $request->get('search');
                $add_date = DB::table('users')
                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                        ->join('positions', 'memberusers.code_herd', '=','positions.herd_code')
                        ->where('positions.idchief', '=' ,Auth::user()->id)
                        ->where('firstnamebem','like', '%'.$search.'%')
                        ->get();  
                //dd($add_date); 
        
        
                return view('chief.add_date' ,['add_date' => $add_date]);
               
                  }else{
                 //
                        return redirect('/home');
                  }

                /*  $search = $request->get('search');
                  $add_date = DB::table('users')
                          ->join('memberusers', 'users.id', '=','memberusers.iduser')
                          ->join('positions', 'memberusers.code_herd', '=','positions.herd_code')
                          ->where('positions.idchief', '=' ,Auth::user()->id)
                          ->where('firstnamebem','like', '%'.$search.'%')
                          ->get();  
                  //dd($add_date); 
          
          
                  return view('chief.add_date' ,['add_date' => $add_date]);*/
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id);
        $add_date = $id;

        return view('chief.add_form' ,['add_date' => $add_date]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {   
        //dd($id);
        $name_la = $request->name_lv;
        $date_la = $request->date_add;

       //dd($request->all(),$date_la);
        $date_up = DB::table('add_date')
                ->where('data_name', '=' ,$name_la)
                ->where('id_user','=', $id)
                ->get();
            //dd($code_user);
            if (Count($date_up) == '1') {
                # code...
                $date_up_1 = $date_up[0]->date_up;

            }else{

                $date_up_1 = '0';


            }

            //dd($date_up_1);

        $date_sum = DB::table('sum_date')
                ->where('leave_name', '=' ,$name_la)
                ->where('user_id','=', $id)
                ->get();

                    if (Count($date_sum) == '1') {
                        # code...
                        $date_sum_lea = $date_sum[0]->leave_name;
                    }
            
        //dd($date_sum,);


        $code_user = DB::table('users')
          ->join('memberusers', 'users.id', '=','memberusers.iduser')
          ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
          ->join('leaves_tops', 'newcompanies.idname', '=','leaves_tops.id_company')
          ->where('memberusers.iduser', '=' , $id)
          ->get();

          if (Count($code_user) == '1') {
            # code...
            $date_code_user = $code_user[0]->sickleave_date;
            $date_code_user1 = $code_user[0]->personalleave_date;
            $date_code_user2 = $code_user[0]->vacationleave_date;

        }else{

            $date_code_user = '0';
            $date_code_user1 = '0';
            $date_code_user2 = '0';

        }

        

        $sum_date_new_1 = $date_code_user + $date_la;
        $sum_date_new_2 = $date_code_user1 + $date_la;
        $sum_date_new_3 = $date_code_user2 + $date_la;

  $sum_all = DB::table('sum_date')
        ->where('leave_name', '=' ,$name_la)
        ->where('user_id','=', $id)
        ->get();

    
   // dd($sum_all);

       // dd($date_up,$date_id);  

        if (Count($date_up) == '1') {
            $date_id = $date_up[0]->id; 
            $affected = DB::table('add_date')
                    ->where('id', $date_id)
                    ->update([ 'date_up' => $date_la]);
            # code...
        }else {
            # code...
            //dd('sss');
            DB::table('add_date')->insert(
                ['id_user' => $id,'data_name' => $name_la, 'date_up' => $date_la]
            );
        }


        if (Count($sum_all) == '1') {
            # code...
           //dd($sum_all);
            $date_all_suer = $sum_all[0]->leave_date_user;

        }

        //dd($date_sum);
        if (Count($date_sum) == '1') {
            # code...
            $id_sum = $date_sum[0]->id; 

                    if ($date_sum_lea === 'ลาป่วย') {
                        # code...
                        $all_data = $sum_date_new_1  -  $date_all_suer;
                        //dd('ลาป่วย1');
                        $affected = DB::table('sum_date')
                        ->where('id', $id_sum)
                        ->update(['leave_date' => $date_code_user , 'leave_date_up' => $date_la,'leave_date_sum' => $sum_date_new_1 ,'leave_date_surplus' =>  $all_data]);

                    }elseif ($date_sum_lea === 'ลากิจ') {
                        # code...
                        //dd('ลากิจ1');
                        $all_data = $sum_date_new_2  -  $date_all_suer;
                        
                        $affected = DB::table('sum_date')
                        ->where('id', $id_sum)
                        ->update(['leave_date' => $date_code_user1 , 'leave_date_up' => $date_la ,'leave_date_sum' => $sum_date_new_2 ,'leave_date_surplus' =>  $all_data]);

                    }elseif ($date_sum_lea === 'ลาพักร้อน') {
                        # code...

                        $all_data = $sum_date_new_3  -  $date_all_suer;
                        //dd('ลาพักร้อน1');
                        $affected = DB::table('sum_date')
                        ->where('id', $id_sum)
                        ->update(['leave_date' => $date_code_user2 , 'leave_date_up' => $date_la ,'leave_date_sum' => $sum_date_new_3 ,'leave_date_surplus' =>  $all_data]);

                    }
                

           
        }

        return redirect('add_date')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function show(Add_date $add_date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function edit(Add_date $add_date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Add_date $add_date)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add_date $add_date)
    {
        //
    }
}
