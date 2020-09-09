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
        ///->orderBy('id','DESC')
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
      //dd('asda');

      $boss = DB::table('users')  //หัวหน้า
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.code', '=','positions.codecom')
      ->where('iduser', '=' ,Auth::user()->id)
      ->get();

      $position = DB::table('users')  //ตำเเหน่ง
      ->join('newcompanies', 'users.id', '=','newcompanies.idname')
      ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
      ->join('positions', 'memberusers.code', '=','positions.codecom')
      ->where('iduser', '=' ,Auth::user()->id)
      ->get();
  

      //dd($position);

        $status = DB::table('users')  ///ชื่อ นามสกุลผุ้ใช้
       ->join('memberusers', 'users.id', '=','memberusers.iduser')
       ->where('iduser', '=' ,Auth::user()->id)
        ->get();

        $leave = DB::table('leaves_tops')///ประเภทการลา
        ->get();


      //dd($boss);

        return view('personnel.leave2' , ['status'=> $status ,'boss'=> $boss , 'leave'=> $leave , 'position'=> $position]);
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
        ->whereNull('status_chief')
        ->orderBy('idchief','DESC')
        ->where('head',Auth::user()->id)
        ->Paginate(50);

       /* $soleave2 = DB::table('users') /// อนุมัติเเล้ว ส่วนของพนักงาน
        ->Join('leaves', 'users.id', '=','leaves.idmember')
        ->orderBy('idmember','DESC')
        ->where('status_hr','!=' ,'Null')
        ->where('idmember',Auth::user()->id)
        
        ->get();*/


         

        $Edleave = DB::table('users') //กำลังรออนุมัติ ส่วนเเด้ไขข้อมูล หัวหน้า
        ->rightJoin('positions', 'users.id', '=','positions.idchief')
        ->rightJoin('leaves', 'positions.idchief', '=','leaves.idmember')
        //->Join('leaves', 'positions.idchief', '=','leaves.head')
       // ->rightJoin('positions', 'leaves.id', '=','positions.idchief')
        //->rightJoin('leaves', 'positions.idchief', '=','leaves.head')
        ->whereNull('status_hr')
        ->orderBy('leaves.idmember','DESC')
        ->where('idmember',Auth::user()->id)
        ->Paginate(50);

       //dd($leave);

        return view('chief.leave' , ['leave'=> $leave ,'Edleave'=> $Edleave ]);
      
      }else {

         //dd('พนักงาน');
        $leave = DB::table('users') //กำลังรออนุมัติ ส่วนของพนักงาน
        //->Join('leaves', 'users.id', '=','leaves.idmember')
        ->rightJoin('positions', 'users.id', '=','positions.idchief')
        ->rightJoin('leaves', 'positions.idchief', '=','leaves.idmember')
        ->whereNull('status_hr')
       // //->orderBy('idmember','DESC')
        ->where('idmember',Auth::user()->id)
        ->get();
        //dd($leave);

        $leave2 = DB::table('users') /// อนุมัติเเล้ว ส่วนของพนักงาน
        ->rightJoin('positions', 'users.id', '=','positions.idchief')
        ->rightJoin('leaves', 'positions.idchief', '=','leaves.idmember')
        ->orderBy('idmember','DESC')
        ->where('status_hr','!=' ,'Null')
        ->where('idmember',Auth::user()->id)
        
        ->Paginate(25);


 
         return view('personnel.leave3',   ['leave'=> $leave , 'leave2'=> $leave2]);
        
      }
         
    }


    public function record()
    {
      //dd('sadas');
      $soleave2 = DB::table('users') /// อนุมัติเเล้ว ส่วนของหัวหน้า
      ->leftJoin('positions', 'users.id', '=','positions.idchief')
      ->leftJoin('leaves', 'positions.idchief', '=','leaves.idmember')
      ->orderBy('leaves.id')
      ->where('status_hr','!=' ,'Null')
      ->where('idmember',Auth::user()->id)
      //->distinct()
      ->get();

      //dd($soleave2);

        return view('chief.leaverecord' , ['soleave2' => $soleave2]) ;
  
    }




    ///------------------personnel-------------------------///


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
///
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
