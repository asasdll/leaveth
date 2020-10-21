<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use App\Memberuser;
use App\Positionsups;
use Auth;
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
        //dd($name,$date);
        $user_aaa = DB::table('users')
            ->join('newcompanies', 'users.id', '=','newcompanies.idname')
            ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ->orderBy('times.user_id')
            ->orderBy('times.time_date','DESC')
            ->where('time_in','like', '%'.$date.'%')
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
            ->where('time_in','like', '%'.$date.'%')
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


    public function pos()
    {
      //dd('pos');
      $status = DB::table('users') ///เเสดงชื่อพนักงาน
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->where('idname', '=' ,Auth::user()->id)
      ->Paginate(50);

      $posed = DB::table('users') ///เเสดงชื่อพนักงาน
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.iduser', '=','positions.idchief')
      ->where('idname', '=' ,Auth::user()->id)
      ->get();


      
      //dd($status);

        return view('hr.position',['status'=>$status ,'posed'=>$posed]);
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
      //dd($idchief);
        $this->validate($request, [
            'position'=> ['required', 'string', 'max:255'],
    
         ]);
           $code_herd_jer =  Str::random(12);
          $member = new Position;
              $member->codecom = $request->codecom;
              $member->idchief = $request->idchief;
              $member->fname = $request->fname;
              $member->lname = $request->lname;
              $member->niname = $request->niname;
              $member->position = $request->position;
              $member->herd_code =  $code_herd_jer;
    //dd( $member);
              $affected = DB::table('users')
              ->where('id', "$request->idchief")
              ->update(['status' => 'chief']);


              //$reg = Position::find($id);
             
             // $reg1 = $reg->idchief;

              $affected = DB::table('memberusers')
              ->where('iduser', "$request->idchief")
              ->update(['code_herd' => "$code_herd_jer"]);
    //dd($member);
             $member->save();
    
               return redirect('pos');
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
          return view('hr.positionup', compact('ticket','id'));
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
      $ticket = DB::table('memberusers')
      ->join('positions', 'memberusers.iduser', '=','positions.idchief')
      ->where('positions.id', '=' ,$id)
      //->where('memberusers.iduser', '=' , 'memberusers.iduser')
      ->get();

      $posed = DB::table('positions')
      ->get();
  
      //dd($posed);
      
           return view('hr.editpositionsup', compact('ticket','id') ,['posed' =>$posed]);
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
          
          $member->position = $request->position;

//dd($member);
         $member->save();

           return redirect('pos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Position $position, $id)
    {
            ///dd($id);
      $reg = Position::find($id);

      $reg->delete();


      $reg1 = $reg->idchief;
      $reg2 = $reg->herd_code;
     
   //dd($reg2);
         // tabel users
      $affected = DB::table('users')
              ->where('id', "$reg1")
              ->update(['status' => 'personnel']);

            ///table  memberusers
     /* //$posed_1 = DB::table('positions')
        ->where('herd_code')
        ->get();*/
        
       // $posed_2 = $posed_1->herd_code;
      //dd($reg2);
      $affected1 = DB::table('memberusers')
              ->where('code_herd', "$reg2")
              ->update(['code_herd' => NULL]);
      //session::flash('massage','ลบข้อมูลเรียบร้อยเเล้ว');
      return redirect('pos');
    }
}