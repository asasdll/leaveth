<?php

namespace App\Http\Controllers;

use App\Memberuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class MemberuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = request()->User();
      if ($user && $user->status == 'chief') {
        //dd('aaa');
            $users = Memberuser::orderBy('iduser')->where('iduser', '=' ,Auth::user()->id)->get();

            return view('chief',['users' => $users]);
      }else {
        //dd('royd');

          $userspe = Memberuser::orderBy('iduser')->where('iduser', '=' ,Auth::user()->id)->get();

        return view('personnel',['userspe' => $userspe]);
          }
    }

    public function tablepe()
    {
     
      $user = request()->User();
      if ($user && $user->status == 'chief') {

        $user_aaa = DB::table('users')
        ->join('memberusers', 'users.id', '=','memberusers.iduser')
        ->join('times', 'memberusers.iduser', '=','times.user_id')
        ///->groupBy('id','DESC')
         ->where('iduser', Auth::user()->id)
        
         ->Paginate(31);
   
           return view('chief.table', ['user_aaa' => $user_aaa]);

      }else {

        $user_aaa = DB::table('users')
        ->join('memberusers', 'users.id', '=','memberusers.iduser')
        ->join('times', 'memberusers.iduser', '=','times.user_id')
        ///->orderBy('id','DESC')
         ->where('iduser', Auth::user()->id)
        
         ->Paginate(31);
   
           return view('personnel.table2', ['user_aaa' => $user_aaa]);
      }
    }

    public function search_time_user(Request $request)
    {
      //dd('ddd');
      $search = $request->get('search_time_user');
      //dd($search);
      $user_aaa = DB::table('users')
            ->join('memberusers', 'users.id', '=','memberusers.iduser')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ->where('time_in','like', '%'.$search.'%')
            ->where('iduser',Auth::user()->id)
            ->Paginate(31);

     //dd($user_aaa);

      return view('personnel.table2' , ['user_aaa' => $user_aaa]);
    }

    public function search_time_chief(Request $request)
    {
      //dd('ddd');
      $search = $request->get('search_time_chief');
      //dd($search);
      $user_aaa = DB::table('users')
            ->join('memberusers', 'users.id', '=','memberusers.iduser')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ->where('time_in','like', '%'.$search.'%')
            ->where('iduser',Auth::user()->id)
            ->Paginate(31);

     //dd($user_aaa);

      return view('chief.table' , ['user_aaa' => $user_aaa]);
    }



    public function leave2()
    {
     // dd('asda');
      
      $check_code = DB::table('memberusers')
      ->where('code_herd','=', 'null')
      ->where('iduser',Auth::user()->id)
      ->get();
      //$check_code1 = $check_code()->code_herd; 

     // dd($check_code);
      if(Count($check_code) != '1' ) {
        # code...
        //dd('มีรหัสเเล้ว');
        $boss = DB::table('users')  //หัวหน้า
      ->Join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->Join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->Join('positions', 'memberusers.code_herd', '=','positions.herd_code')
      ->groupBy('idchief')
    // ->Join('positions', 'users.id', '=','positions.idchief')
      //->Join('memberusers', 'users.id', '=','memberusers.idname')
      ->where('iduser', '=' ,Auth::user()->id)
      //->distinct()
     ->get();
     //->get();
      //dd($boss);
      /*$position = DB::table('users')  //ตำเเหน่ง
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.code', '=','positions.codecom')
      //0908->groupBy('idchief')
      ->where('iduser', '=' ,Auth::user()->id)
      ->get();*/
  

      //dd($position);

        $status = DB::table('users')  ///ชื่อ นามสกุลผุ้ใช้
       ->join('memberusers', 'users.id', '=','memberusers.iduser')
       ->where('iduser', '=' ,Auth::user()->id)
        ->get();

        $leave = DB::table('leaves_tops')///ประเภทการลา
        ->get();

        return view('personnel.leave2' , ['status'=> $status ,'boss'=> $boss , 'leave'=> $leave ]);

      }else {
        //dd('ยังไม่มีรหัส');
        $code_id = DB::table('memberusers')  ///ชื่อ นามสกุลผุ้ใช้
        ->where('iduser', '=' ,Auth::user()->id)
         ->get();
       
        return view('personnel.newcode_herd',['code_id' =>$code_id]);
      }
   
    }


    public function leave3()
    {
      
      $user = request()->User();
      //dd( $user);
      if ($user && $user->status == 'chief') {
       
       // dd('หัวหน้า');
        $leave = DB::table('users') //กำลังรออนุมัติ  ของหัวหน้า
        ->rightJoin('positions', 'users.id', '=','positions.idchief')
        ->rightJoin('leaves', 'positions.idchief', '=','leaves.idmember')
        //->rightJoin('leaves', 'positions.idchief', '=','leaves.idmember')
        ->whereNull('status_chief')
        ->orderBy('leaves.id','ASC')
        ->groupBy('leaves.id')
        ->where('head',Auth::user()->id)
        ->Paginate(50);

       /* $soleave2 = DB::table('users') /// อนุมัติเเล้ว ส่วนของพนักงาน
        ->Join('leaves', 'users.id', '=','leaves.idmember')
        ->orderBy('idmember','DESC')
        ->where('status_hr','!=' ,'Null')
        ->where('idmember',Auth::user()->id)
        
        ->get();*/


         

       /* $Edleave = DB::table('users') //กำลังรออนุมัติ ส่วนเเด้ไขข้อมูล หัวหน้า
        ->rightJoin('positions', 'users.id', '=','positions.idchief')
        ->rightJoin('leaves', 'positions.idchief', '=','leaves.idmember')
        /*->rightJoin('leaves', 'users.id', '=','leaves.idmember')
        ->leftJoin('positions', 'leaves.head', '=','positions.idchief')
        //->rightJoin('leaves', 'positions.idchief', '=','leaves.head')
        //->groupBy('idchief')
        //->whereNull('status_chief')
        ->whereNull('status_hr')
        ->orderBy('leaves.id','ASC')
        ->where('idchief',Auth::user()->id)
        ->groupBy('leaves.id')
        ->Paginate(50);*/

      //dd($leave,$Edleave);

        return view('chief.leave' , ['leave'=> $leave  ]);
      
      }else {

         //dd('พนักงาน');
        $leave = DB::table('users') //กำลังรออนุมัติ ส่วนของพนักงาน
        ->Join('positions', 'users.id', '=','positions.idchief')
        ->Join('leaves', 'positions.idchief', '=','leaves.head')
        //->Join('leaves', 'users.id', '=','leaves.idmember')
        ->whereNull('status_hr')
        //->orderBy('leaves.id','ASC')
        //->groupBy('leaves.id')
        ->where('idmember',Auth::user()->id)
        ->groupBy('leaves.id')
        ->get();
        //dd($leave);

        $leave2 = DB::table('users') /// อนุมัติเเล้ว ส่วนของพนักงาน
        //->Join('positions', 'users.id', '=','positions.idchief')
        ->Join('leaves', 'users.id', '=','leaves.idmember')
        ->Join('positions', 'leaves.head', '=','positions.idchief')
        ->orderBy('leaves.id','ASC')
        ->where('status_chief','!=' ,'Null')
        ->where('status_hr','!=' ,'Null')
        ->where('idmember',Auth::user()->id)
        ->groupBy('leaves.id')
        ->Paginate(25);


 //dd($leave2);
         return view('personnel.leave3',   ['leave'=> $leave , 'leave2'=> $leave2]);
        
      }
         
    }


    public function record()
    {
      //dd('sadas');
      $soleave2 = DB::table('users') /// อนุมัติเเล้ว ส่วนของหัวหน้า
      ->leftJoin('positions', 'users.id', '=','positions.idchief')
      ->leftJoin('leaves', 'positions.idchief', '=','leaves.idmember')
      ->orderBy('leaves.id','ASC')
      ->where('status_hr','!=' ,'Null')
      ->where('idmember',Auth::user()->id)
      ->groupBy('leaves.id')
      ->get();

      //dd($soleave2);

      $Edleave = DB::table('users') /// อนุมัติเเล้ว ส่วนของหัวหน้า
      ->leftJoin('positions', 'users.id', '=','positions.idchief')
      ->leftJoin('leaves', 'positions.idchief', '=','leaves.idmember')
      ->orderBy('leaves.id','ASC')
      ->whereNull('status_hr')
      ->where('idmember',Auth::user()->id)
      ->groupBy('leaves.id')
      ->get();

        //dd($Edleave);

        return view('chief.leaverecord' , ['soleave2' => $soleave2 ,'Edleave' => $Edleave]) ;
  
    }




    ///------------------personnel-------------------------///


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('auth.account');
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
            'code'=> ['required', 'string', 'max:255'],
            'firstnamebem'=> ['required', 'string', 'max:255'],
            'lastnamebem' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric'],
            'tel2' => ['required', 'numeric'],
            'telname2' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
         ]);



         $Number  = $request->code;
         $reg = DB::table('newcompanies')->orderBy('newcode')->where('newcode', '=' ,$Number) ///เช้คว่ามี code ใน Newcompanies

          ->get();
      //dd($reg);
      
      if (Count($reg) == '1') {
        $member = new Memberuser;
            $member->iduser = Auth::user()->id;
            $member->code = $request->code;
            $member->firstnamebem = $request->firstnamebem;
            $member->lastnamebem = $request->lastnamebem;
            $member->nickname = $request->nickname;
            $member->age = $request->age;
            $member->date = $request->date;
            $member->tel = $request->tel;
            $member->tel2 = $request->tel2;
            $member->telname2 = $request->telname2;
            $member->tel3 = $request->tel3;
            $member->telname3 = $request->telname3;
            $member->address = $request->address;
            $member->city = $request->city;
            $member->status2 = $request->status2;
            $member->postalcode = $request->postalcode;
            $member->code_herd = 'null';
            $image = $request->file('image');

         if($request->hasFile('image') == '1'){
            $image = $request->file('image');
            $image->move(public_path().'/img/profile/',$image->getClientOriginalName());
            $member->image=$image->getClientOriginalName();
          //  $member = $img->getClientOriginalExtension();
          //	$img->save();
        }else {
          $member->image = "icon_i2.png";
        }
  //
  //dd($member);
           $member->save();
              return redirect('/home');
         

             //return redirect('chief');
            // dd('sdasd');
      } else {
          return redirect('/home')->with('successv','กรุณา ตรวจสอบ Code ใหม่ หรือ ติดต่อ HR');
      //  dd('ตรวจสอบcode ใหม่');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memberuser  $memberuser
     * @return \Illuminate\Http\Response
     */
    public function show(Memberuser $memberuser)
    {
        $reg = Leave::find($id);

  
      //dd($reg);
            return view('personnel.leave4', compact('reg','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memberuser  $memberuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Memberuser $memberuser,$id)
    {
        $chief = Memberuser::find($id);
     //dd($chief);
           return view('chief.editchieffrom', compact('chief','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memberuser  $memberuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memberuser $memberuser ,$id)
    {
      

      $member =  Memberuser::find($id);
      $iduser2 =$member["iduser"]; 
      
      $check_id = DB::table('positions')->orderBy('idchief')->where('idchief', '=' ,$iduser2) ///เช้คว่ามี code ใน Newcompanies

      ->get();
//dd( $check_id );

      $this->validate($request, [
        //'code'=> ['required', 'string', 'max:255'],
        'firstnamebem'=> ['required', 'string', 'max:255'],
        'lastnamebem' => ['required', 'string', 'max:255'],
        'tel' => ['required', 'numeric'],
        'tel2' => ['required', 'numeric'],
        'telname2' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'image'=>'image|mimes:jpeg,png,jpg|max:2048'
     ]);


      if (Count($check_id) == "1") {
        //dd('มีid');

        $member =  Memberuser::find($id);
        //dd($member);
           //$member->iduser = Auth::user()->id;
           $member->firstnamebem = $request->firstnamebem;
           $member->lastnamebem = $request->lastnamebem;
           $member->nickname = $request->nickname;
           $member->age = $request->age;
           $member->date = $request->date;
           $member->tel = $request->tel;
           $member->tel2 = $request->tel2;
           $member->telname2 = $request->telname2;
           $member->tel3 = $request->tel3;
           $member->telname3 = $request->telname3;
           $member->address = $request->address;
           $member->city = $request->city;
           $member->status2 = $request->status2;
           $member->postalcode = $request->postalcode;
 
        if($request->hasFile('image')){
           $image = $request->file('image');
           $image->move(public_path().'/img/profile/',$image->getClientOriginalName());
           $member->image=$image->getClientOriginalName();
         //  $member = $img->getClientOriginalExtension();
         //	$img->save();
       }

       $check_id = DB::table('positions')->orderBy('idchief')->where('idchief', '=' ,$iduser2)
       ->update(['fname' => $request->firstnamebem ,'lname' => $request->lastnamebem ,'niname' => $request->nickname]);
           $member->save();
 
         
 
                return redirect('/home');

      }else {
          //dd('ไม่มีไอดี');
        $member =  Memberuser::find($id);
        //dd($member);
           //$member->iduser = Auth::user()->id;
           $member->firstnamebem = $request->firstnamebem;
           $member->lastnamebem = $request->lastnamebem;
           $member->nickname = $request->nickname;
           $member->age = $request->age;
           $member->date = $request->date;
           $member->tel = $request->tel;
           $member->tel2 = $request->tel2;
           $member->telname2 = $request->telname2;
           $member->tel3 = $request->tel3;
           $member->telname3 = $request->telname3;
           $member->address = $request->address;
           $member->city = $request->city;
           $member->status2 = $request->status2;
           $member->postalcode = $request->postalcode;
 
        if($request->hasFile('image')){
           $image = $request->file('image');
           $image->move(public_path().'/img/profile/',$image->getClientOriginalName());
           $member->image=$image->getClientOriginalName();
         //  $member = $img->getClientOriginalExtension();
         //	$img->save();
       }
 
 //dd($member);
           $member->save();
 
         
 
                return redirect('/home');

      }


        
         
              
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memberuser  $memberuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memberuser $memberuser)
    {
        //
    }
}