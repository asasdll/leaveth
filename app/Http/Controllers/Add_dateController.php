<?php

namespace App\Http\Controllers;

use App\Add_date;
use Auth;
use DB;
use DateTime;
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
        //dd('sada');

        $user = request()->User();
            if ($user && $user->status == 'chief') {

                $search = $request->get('search');
                $add_date = DB::table('users')
                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                        ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                        ->join('sum_top', 'newcompanies.id', '=','sum_top.id_com')
                        ->leftJoin('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                       ->leftJoin('sum_add_date', 'memberusers.iduser', '=','sum_add_date.id_u')
                        //->selectRaw(DB::raw("SUM(date_up) as add_date ,firstnamebem ,lastnamebem"))
                        
                        ->where('positions.id_user', '=' ,Auth::user()->id)
                        ->where('firstnamebem','like', '%'.$search.'%')
                        ->orderBy('memberusers.id','ASC')
                        ->get();  

                        /*$orders = DB::table('add_date')
                                ->select(DB::raw("SUM(date_up) as add_date ,id_user ,data_name"))
                                ->groupBy('id_user')
                                ->groupBy('data_name')
                                ->get();*/
               // $add_date  = array("$orders");
                    
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

        $dateTime = new DateTime();               
        $array = (array)$dateTime;
        $array = $array["date"];
        $time = substr($array,0,-7);

           //dd($array);
        $this->validate($request, [
            'name_lv' => ['required','string', 'max:255'],
            'date_add' => ['required','numeric'],
            
            
         ]);
        //dd($id);
        $name_la = $request->name_lv;
        $date_la = $request->date_add;


        $member = new Add_date;       
                $member->id_user = $id;
                $member->data_name = $name_la;
                $member->date_up =$date_la;


       
     //dd($member);
    $member->save();

     $sum_add_date = DB::table('sum_add_date')
            ->where('id_u', '=' ,$id)
            ->get();  
         //dd($sum_add_date);
            $orders = DB::table('add_date')
                                ->select(DB::raw("SUM(date_up) as add_date ,data_name,id_user"))
                                ->where('id_user', '=' , $id)
                                ->groupBy('data_name')
                                ->get();
           // dd($name_la);
               
                            //    $aa = 5 + NULL;
//dd($sum_add_date);
            if (Count($sum_add_date) === 1) {
                # code...dd
               // dd('มี');
                    if ($name_la == 'ลากิจ') {
                       // dd('git');
                                if (Count($orders) === 1) {
                                    # code...
                                    //dd('1');
                                         $per_date = $orders[0]->add_date;  //   ลากิจ
                                   // dd($per_date);

                                }else {
                                    $per_date = $orders[0]->add_date;
                                }
                            //dd($per_date);
                        $affected = DB::table('sum_add_date')
                                ->where('id_u', $id)
                                ->update(['personal_name' => $name_la ,'personal_date' => $per_date,
                                          'updated_at' => $time]);
                        
                    }else{
                        # code...
                    //dd('v');
                        if (Count($orders) === 1) {
                            # code...
                            //dd('1');
                            //$per_date = $orders[0]->add_date; //   ลากิจ
                            $vac_date = $orders[0]->add_date; //   ลาพักร้อน
    
                        }else {
                            $vac_date = $orders[0]->add_date;
                        }
                       // dd($vac_date);
                        $affected = DB::table('sum_add_date')
                                ->where('id_u', $id)
                                ->update(['vacation_name' => $name_la ,'vacation_date' => $vac_date,
                                          'updated_at' => $time]);
                            
                    }
            }else {
                # code...
            //dd('no');
                if ($name_la == 'ลากิจ') {
                    # code...
              //   dd('git');
                        if (Count($orders) === 1) {
                            # code...
                            //dd('1');
                              $per_date = $orders[0]->add_date;  //   ลากิจ

                        }else {
                            # code...
                            $per_date = NULL;
                        }

                    DB::table('sum_add_date')->insert(
                        ['id_u' => $id,'personal_name' => $name_la,'personal_date' => $per_date,
                        'created_at' => $time,'updated_at' => $time]
                    );
                }else {
                    # code...
                 //  dd('v');
                        if (Count($orders) === 1) {
                            # code...
                            //dd('1');
                            //$per_date = $orders[0]->add_date; //   ลากิจ
                            $vac_date = $orders[0]->add_date; //   ลาพักร้อน

                        }else {
                            # code...
                            $vac_date = NULL;
                        }
                       // dd($vac_date);
                    DB::table('sum_add_date')->insert(
                        ['id_u' => $id,'vacation_name' => $name_la,'vacation_date'=> $vac_date,
                        'created_at' => $time,'updated_at' => $time]
                    );
                }
            }

//dd($sum_add_date);
       
   

       //dd($request->all(),$date_la);
        

        return redirect("show_date/$id")->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Add_date $add_date ,$id)
    {
        //dd()
        $search = $request->get('search_leaves');
       // dd($search);
        $show_date = DB::table('add_date')
        ->where('id_user', '=' ,$id)
        ->where('data_name','like', '%'.$search.'%')
        ->where('created_at','like', '%'.$search.'%')
        ->orderBy('id','DESC')
        ->Paginate(50);

     $id_user = $id;

        //dd($id_user);
        return view('chief.show_date' ,compact('id_user','id'),['show_date' => $show_date]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function edit(Add_date $add_date,$id)
    {

        $reg = Add_date::find($id);
        $id_user = $id;
     // dd($reg);

        return view('chief.edit_date' ,compact('reg','id_user','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Add_date $add_date ,$id)
    {
        
          // dd($id);
           $this->validate($request, [
            'name_lv' => ['required','string', 'max:255'],
            'date_add' => ['required','numeric'],
            
            
         ]);
        //dd($id);
        $name_la = $request->name_lv;
        $date_la = $request->date_add;


        $member = Add_date::find($id);      
                $member->data_name = $name_la;
                $member->date_up =$date_la;


       
       // dd($member);
      $member->save();

      $show_date = DB::table('add_date')
            ->where('id', '=' ,$id)
            ->Paginate(50);


            $id_user = $show_date['0']->id_user;

            //dd($reg,$id);

      return redirect("show_date/$id_user")->with('success', 'บันทึกข้อมูลเรียบร้อย');
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