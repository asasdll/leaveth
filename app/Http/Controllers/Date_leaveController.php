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

             /*$member->status_chief = $request->status_chief;
             $member->status_text1 = $request->status_text1;
             $member->status_hr = $request->status_hr;
             $member->status_text2 = $request->status_text2;*/
            
   
            
            // dd($member);
             $member->save();

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

        /*$member->status_chief = $request->status_chief;
        $member->status_text1 = $request->status_text1;
        $member->status_hr = $request->status_hr;
        $member->status_text2 = $request->status_text2;*/
       

       
        //d($member);
        $member->save();
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
