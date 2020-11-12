<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leaves_tops;
use Auth;
use DB;
use DateTime;

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
                        ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                        ->join('sum_top', 'newcompanies.id', '=','sum_top.id_com')
                        ->leftJoin('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                       ->leftJoin('sum_add_date', 'memberusers.iduser', '=','sum_add_date.id_u')
                         ->where('memberusers.iduser', '=' ,Auth::user()->id)
               // ->where('firstnamebem','like', '%'.$search.'%')

               
                        ->get();   

              // dd( $code_user);
                return view('.chief.sum_date_ch' ,['code_user' =>$code_user]);

      }elseif ($user && $user->status == 'hr') {
          # code...
          $code_user = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
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

          $save_data = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
                ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                ->join('sum_top', 'newcompanies.id', '=','sum_top.id_com')
                ->leftJoin('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                ->leftJoin('sum_add_date', 'memberusers.iduser', '=','sum_add_date.id_u')
                ->where('memberusers.iduser', '=' ,Auth::user()->id)
                ->get();   
      //  dd($code_user);
   
            //dd($save_data);                       
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

          
        
                    //dd($id_leave);
                    return view('.hr.date_leave');
                 
           
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
            'personalleave_date' => ['required','numeric'],
            'vacationleave_date' => ['required','numeric'],
            
            
         ]);
      // dd($request->all());
         //dd($id_company);
         $member = new leaves_tops;       
             $member->id_company = Auth::user()->id;
             $member->personalleave = 'ลากิจ';
             $member->personalleave_date = $request->personalleave_date;
             $member->vacationleave = 'ลาพักร้อน';
             $member->vacationleave_date = $request->vacationleave_date;

 
            
            // dd($member);
           $member->save();

           $dateTime = new DateTime();               
           $array = (array)$dateTime;
           $array = $array["date"];
           $array = substr($array,0,-7);
          //  dd($array);   

           $top_p = DB::table('leaves_tops')
                ->select(DB::raw("SUM(personalleave_date)  as ras_pers"))
                ->where('id_company', '=' ,Auth::user()->id)
                ->groupBy('id_company')
                ->get();

           $top_v = DB::table('leaves_tops')
                ->select(DB::raw("SUM(vacationleave_date)  as ras_vaca  "))
                ->where('id_company', '=' ,Auth::user()->id)
                ->groupBy('id_company')
                ->get();

                $pers = $top_p['0']->ras_pers;
                $vaca = $top_v['0']->ras_vaca;


                $top_com = DB::table('sum_top')
                ->where('id_com', '=' ,Auth::user()->id)
                ->get();
            //dd($top_com); 
            if (Count($top_com) == 1) {

            
                $affected = DB::table('sum_top')
                        ->where('id_com', Auth::user()->id)
                        ->update([
                            'personalleave_date' => $pers, 
                            'vacationleave_date' => $vaca ,
                            'updated_at'=> $array]);
               
                    
            }else {

                  //  dd('no');
                    
                    DB::table('sum_top')->insert([
                        ['id_com' => Auth::user()->id,
                        'personalleave' => 'ลากิจ',
                        'personalleave_date' => $pers, 
                        'vacationleave' => 'ลาพักร้อน' ,
                        'vacationleave_date' => $vaca ,
                        'created_at'=> $array,'updated_at'=> $array]

                    ]);

                }


    
          
          
             return redirect('date_leave')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $user = request()->User();
        if ($user && $user->status == 'hr') {

                $id_leave = DB::table('leaves_tops')
                ->where('id_company',Auth::user()->id)
                //->groupBy('id_company')
                ->get();
        
                    //dd($id_leave);
                    return view('.hr.date_leave_show',['id_leave' => $id_leave]);
                 
           
              }else{
             //
                    return redirect('/home');
              }


   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            //dd('asd');
        $id_com = DB::table('leaves_tops')
        ->where('id',$id)
        //->groupBy('id_company')
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

        $this->validate($request, [
                'personalleave_date' => ['required','numeric'],
                'vacationleave_date' => ['required','numeric'],
                
                
             ]);
        
        $member =  leaves_tops::find($id);
        //dd( $member);

        $member->personalleave_date = $request->personalleave_date;
        $member->vacationleave_date = $request->vacationleave_date;

    
       $member->save();

       
       $dateTime = new DateTime();               
       $array = (array)$dateTime;
       $array = $array["date"];
       $array = substr($array,0,-7);
      //  dd($array);   

       $top_p = DB::table('leaves_tops')
            ->select(DB::raw("SUM(personalleave_date)  as ras_pers"))
            ->where('id_company', '=' ,Auth::user()->id)
            ->groupBy('id_company')
            ->get();

       $top_v = DB::table('leaves_tops')
            ->select(DB::raw("SUM(vacationleave_date)  as ras_vaca  "))
            ->where('id_company', '=' ,Auth::user()->id)
            ->groupBy('id_company')
            ->get();

            $pers = $top_p['0']->ras_pers;
            $vaca = $top_v['0']->ras_vaca;


            $top_com = DB::table('sum_top')
            ->where('id_com', '=' ,Auth::user()->id)
            ->get();
        //dd($top_com); 
        if (Count($top_com) == 1) {

        
            $affected = DB::table('sum_top')
                    ->where('id_com', Auth::user()->id)
                    ->update([
                        'personalleave_date' => $pers, 
                        'vacationleave_date' => $vaca ,
                        'updated_at'=> $array]);
           
                
        }else {

              //  dd('no');
                
                DB::table('sum_top')->insert([
                    ['id_com' => Auth::user()->id,
                    'personalleave' => 'ลากิจ',
                    'personalleave_date' => $pers, 
                    'vacationleave' => 'ลาพักร้อน' ,
                    'vacationleave_date' => $vaca ,
                    'created_at'=> $array,'updated_at'=> $array]

                ]);

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