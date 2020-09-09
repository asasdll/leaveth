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
    
          $member = new Position;
              $member->codecom = $request->codecom;
              $member->idchief = $request->idchief;
              $member->fname = $request->fname;
              $member->lname = $request->lname;
              $member->niname = $request->niname;
              $member->position = $request->position;
    
              $affected = DB::table('users')
              ->where('id', "$request->idchief")
              ->update(['status' => 'chief']);
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
   //dd($reg1);

      $affected = DB::table('users')
              ->where('id', "$reg1")
              ->update(['status' => 'personnel']);
      //session::flash('massage','ลบข้อมูลเรียบร้อยเเล้ว');
      return redirect('pos');
    }
}
