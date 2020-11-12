<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use App\Memberuser;
use App\Positionsups;
use Auth;
use PDF;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PositionController extends Controller
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

    public function __construct()
    {
        $this->middleware('checkage');
    }
    public function new_pdf($name,$date)
    {
     //   dd($name,$date);
        $user_aaa = DB::table('users')
            ->join('newcompanies', 'users.id', '=','newcompanies.idname')
            ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ->orderBy('times.user_id')
            ->orderBy('times.time_date','DESC')
            ->where('time_date','like', '%'.$date.'%')
            ->where('firstnamebem','like', '%'.$name.'%')
            ->where('idname',Auth::user()->id)
            ->get();
        $pdf = PDF::loadview('hr.pdf_time',['user_aaa'=> $user_aaa]);
       return @$pdf->stream();
       // dd($user_aaa);
  
        //return view('hr.pdf_time' , ['user_aaa' => $user_aaa]);
    }
    public function pdf_date($date)
    {
        //dd($date);
        $user_aaa = DB::table('users')
            ->join('newcompanies', 'users.id', '=','newcompanies.idname')
            ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ->orderBy('times.user_id')
            ->orderBy('times.time_date')
            ->where('time_date','like', '%'.$date.'%')
            ->where('idname',Auth::user()->id)
            ->get();
        $pdf = PDF::loadview('hr.pdf_time',['user_aaa'=> $user_aaa]);
       return @$pdf->stream();
        //dd($user_aaa);
  
        //return view('hr.pdf_time' , ['user_aaa' => $user_aaa]);
    }

    public function pdf_name($name)
    {
        //dd($name);
        $user_aaa = DB::table('users')
            ->join('newcompanies', 'users.id', '=','newcompanies.idname')
            ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ->orderBy('times.user_id','ASC')
            ->orderBy('times.time_date','ASC')
            ->orderBy('times.time_in','ASC')
            ->where('firstnamebem','like', '%'.$name.'%')
            ->where('idname',Auth::user()->id)
            ->get();

            $image_user = DB::table('users')
            ->join('newcompanies', 'users.id', '=','newcompanies.idname')
            ->where('idname',Auth::user()->id)
            ->get();

            //dd($img_user);
        $pdf = PDF::loadview('hr.pdf_time',['image_user'=> $image_user ,'user_aaa'=> $user_aaa]);
       return @$pdf->stream();
        //dd($user_aaa);
  
        //return view('hr.pdf_time' , ['user_aaa' => $user_aaa]);
    }


    public function pos(Request $request)
    {
      //dd('pos');

     $pos = $request->get('Search');
    //dd($pos);


      $posed = DB::table('positions') ///เเสดงชื่อพนักงาน
      ->where('division','like', '%'.$pos.'%')
      /*->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.iduser', '=','positions.idchief')*/
      ->where('id_com', '=' ,Auth::user()->id)
      ->orderBy('id','ASC')
      ->Paginate(50);


     

      
      //dd($pass_div);

        return view('hr.position',['posed'=>$posed ]);
    }

    public function pos_p(Request $request)
    {
      //dd('pos');

     $pos = $request->get('Search');
    //dd($pos);
      $status = DB::table('users') ///เเสดงชื่อพนักงาน
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->where('idname', '=' ,Auth::user()->id)
      ->where('memberusers.firstnamebem','like', '%'.$pos.'%')
      ->whereNull('pass_division')
      ->orderBy('memberusers.id','ASC')
      ->Paginate(50);



      $pass_div = DB::table('users') ///เเสดงชื่อพนักงาน
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
      ->where('newcompanies.idname', '=' ,Auth::user()->id)
      ->where('memberusers.firstnamebem','like', '%'.$pos.'%')
      ->where('positions.division','like', '%'.$pos.'%')
      ->where('memberusers.pass_division' ,'!=' , "")
      ->orderBy('memberusers.id','ASC')
      ->Paginate(50);

      
      //dd($pass_div);

        return view('hr.position_p',['status'=>$status ,'pass_div'=>$pass_div]);
    }

    
    function search(Request $request) //ค้นหา
    {
     //dd('55');
      $search = $request->get('Search');

      //dd($search);
      $status = DB::table('users') ///เเสดงชื่อพนักงาน
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->where('firstnamebem','like', '%'.$search.'%')
      ->where('idname', '=' ,Auth::user()->id)
      ->Paginate(50);
     
      //dd($status);

      $posed = DB::table('users') ///เเสดงชื่อพนักงาน
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.iduser', '=','positions.idchief')
      ->where('idname', '=' ,Auth::user()->id)
      ->get();

      return view('hr.position',['status'=>$status , 'posed'=>$posed]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //dd($request->all());
        $affected = DB::table('memberusers')
        ->where('id', "$id")
        ->update(['pass_division' => $request->division]);
        
        return redirect('pos_p')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($idchief);
        $this->validate($request, [
            'position'=> ['required', 'string', 'max:255'],
    
         ]);
           $code_herd_jer =  Str::random(30);
          $member = new Position;
              $member->id_com = Auth::user()->id;
              $member->code_division = $code_herd_jer;
              $member->division =  $request->position;


             // dd($member);
             $member->save();
    
               return redirect('pos')->with('success', 'บันทึกข้อมูลเรียบร้อย');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position ,$id)
    {
        $ticket = Memberuser::find($id);
        //dd($ticket);

        $posed = DB::table('positions') ///เเสดงชื่อพนักงาน
        ->where('id_com', '=' ,Auth::user()->id)
        ->get();
          return view('hr.positionup', compact('ticket','id'),['posed'=>$posed]);
    }


    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('positions')
        ->where('division', 'LIKE', "%{$query}%")
        ->where('id_com', '=' ,Auth::user()->id)
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->division.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position , $id)
    {
        //$ticket = Memberuser::find($id)
      //dd($id);
      $posed = DB::table('positions')
      ///->join('positions', 'memberusers.iduser', '=','positions.idchief')
      ->where('id', '=' ,$id)
      //->where('memberusers.iduser', '=' , 'memberusers.iduser')
      ->get();

      //$posed = DB::table('positions')
      //->get();
  
      //dd($posed);
      
           return view('hr.edit_positions', compact('posed','id'));
    }

    public function p_div(Position $position , $id)
    {
        //$ticket = Memberuser::find($id)
      //dd($id);
      $ticket = DB::table('memberusers')
      ///->join('positions', 'memberusers.iduser', '=','positions.idchief')
      ->where('iduser', '=' ,$id)
      //->where('memberusers.iduser', '=' , 'memberusers.iduser')
      ->get();

      $posed = DB::table('positions')
      ///->join('positions', 'memberusers.iduser', '=','positions.idchief')
      ->where('id_com', '=' ,Auth::user()->id)
      //->where('memberusers.iduser', '=' , 'memberusers.iduser')
      ->get();

      //$posed = DB::table('positions')
      //->get();
  
    //dd($posed);
      
           return view('hr.e_p_positions',['posed'=>$posed ,'ticket'=>$ticket] );
    }

    public function p_e_div(Request $request ,Position $position , $id)
    {
        //$ticket = Memberuser::find($id)
     // dd($id);
      $affected1 = DB::table('memberusers')

      ->where('iduser', "$id")
      ->update(['pass_division' => $request->division]);

  
    //dd($posed);
      
           return redirect('pos_p' )->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }


    public function p_d_div(Request $request ,Position $position , $id)
    {
        //$ticket = Memberuser::find($id)
   // dd($id);
      $affected1 = DB::table('memberusers')

      ->where('iduser', "$id")
      ->update(['pass_division' => NULL]);

  
    //dd($posed);
      
           return redirect('pos_p' )->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    
    public function pos_c(Request $request)
    {
      //dd('pos');

     $pos = $request->get('Search');
    


      $pass_div = DB::table('users') ///เเสดงชื่อพนักงาน
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
      ->where('newcompanies.idname', '=' ,Auth::user()->id)
      ->where('memberusers.firstnamebem','like', '%'.$pos.'%')
      ->where('positions.division','like', '%'.$pos.'%')
      ->where('memberusers.pass_division' ,'!=' , "")
      ->whereNULL('positions.id_user')
      ->orderBy('memberusers.id','ASC')
      ->Paginate(50);

      $pass_pos = DB::table('positions') ///เเสดงชื่อพนักงาน
      ->join('memberusers', 'positions.id_user', '=','memberusers.iduser')
      ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')

      ->where('newcompanies.idname', '=' ,Auth::user()->id)
      ->where('memberusers.firstnamebem','like', '%'.$pos.'%')
      ->where('positions.division','like', '%'.$pos.'%')
      ->where('positions.id_user' , '!=', NULL)
      ->orderBy('memberusers.id','ASC')
      ->Paginate(50);

      
      //dd($pass_pos);

        return view('hr.position_c',['pass_div'=>$pass_div ,'pass_pos' =>$pass_pos]);
    }

    public function pos_c_up(Request $request,$id)
    {
      //dd('pos');
      //dd($id);
      $id_user = substr($id, 0,-2); //idหนักงาน
      $id_po = substr($id, -1); //id ตำเเหน่ง
      $user_name = DB::table('memberusers') ///เเสดงชื่อพนักงาน
            ->where('iduser', '=' ,$id_user)
            ->get();

          $name = $user_name[0]->firstnamebem;
          $lname =  $user_name[0]->lastnamebem;
          $nikname =  $user_name[0]->nickname;
    // dd($id_user, $id_po,$user_name, $name);

      $affected1 = DB::table('positions')

          ->where('id', "$id_po")
          ->update(['id_user' => $id_user,'nname'=>$name, 'lname' => $lname, 'nikname' => $nikname]);



          $status_user = DB::table('users')
              ->where('id', "$id_user")
              ->update(['status' =>  'chief']);

      //dd($status_user);

      return redirect('pos_c' )->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }


    public function pos_c_d(Request $request,$id)
    {
     // dd($id);
      

      $affected1 = DB::table('positions')

          ->where('id_user', "$id")
          ->update(['id_user' => NULL,'nname'=>NULL , 'lname' => NULL, 'nikname' => NULL]);



        $status_user = DB::table('users')
              ->where('id', "$id")
              ->update(['status' =>  'personnel']);

      //dd($status_user);

      return redirect('pos_c' )->with('success', 'ลบตำเเหน่งหัวหน้าเรียบร้อย');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position ,$id)
    {
          // dd($id);
      $this->validate($request, [
        'position'=> ['required', 'string', 'max:255'],

     ]);

     //dd($request->all());
      $member = Position::find($id);
          
             $member->division =  $request->position;

//dd($member);
         $member->save();

           return redirect('pos')->with('success', 'เเก้ไขข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Position $position, $id)
    {
           // dd($id);
      $reg = Position::find($id);

     $reg->delete();


      //$reg1 = $reg->idchief;
      $reg2 = $reg->code_division;
     
   //dd($reg2);
         // tabel users

            ///table  memberusers
   
       // $posed_2 = $posed_1->herd_code;
      //dd($reg2);
      $affected1 = DB::table('memberusers')
              ->where('pass_division', "$reg2")
              ->update(['pass_division' => NULL]);
      //session::flash('massage','ลบข้อมูลเรียบร้อยเเล้ว');
      return redirect('pos')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}