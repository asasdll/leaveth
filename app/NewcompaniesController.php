<?php

namespace App\Http\Controllers;

use App\Newcompanies;
use App\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class NewcompaniesController extends Controller
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
    public function table()
    {

      $user_aaa = DB::table('users')
            ->join('newcompanies', 'users.id', '=','newcompanies.idname')
            ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ///->orderBy('id','DESC')
             ->where('idname', Auth::user()->id)
             ->get();
            
         

      return view('hr.table' ,['user_aaa' => $user_aaa ]);
    }

    public function search_time(Request $request)
    {
     ///dd($request->all());
      $search_dt = $request->get('search_date');
      $search_na = $request->get('search_name');
   //dd($search, $search2);
      $user_search = DB::table('users')
            ->join('newcompanies', 'users.id', '=','newcompanies.idname')
            ->join('memberusers', 'newcompanies.newcode', '=','memberusers.code')
            ->join('times', 'memberusers.iduser', '=','times.user_id')
            ->orderBy('times.user_id')
            ->orderBy('times.time_date')
            ->where('time_in','like', '%'.$search_dt.'%')
            ->where('firstnamebem','like', '%'.$search_na.'%')
            ->where('idname',Auth::user()->id)
            ->get();
          //$idpdf =  $user_search;
     //dd($idpdf);
     //dd($user_search);
      return view('hr.table' ,['name'=>  $search_na ,'user_aaa' => $user_search ,'date' => $search_dt ]);
    }


    public function leave_hr()
    {

    
 //dd('การขออนุมัติ');

      $leave = DB::table('users') //การขออนุมัติ 
      ->leftJoin('newcompanies', 'users.id', '=','newcompanies.idname')
      ->leftJoin('positions', 'newcompanies.newcode', '=','positions.codecom')
      ->leftJoin('leaves', 'positions.idchief', '=','leaves.head')
      //->rightJoin('leaves', 'positions.iduser', '=','leaves.idmember')
      ->where('status_chief', '!=' ,'null')
      ->whereNull('status_hr')
     
      ->orderBy('idchief','DESC')
      ->where('newcompanies.idname',Auth::user()->id)
      ->Paginate(25);
  //dd($leave);
      return view('hr.leave_hr' ,['leave' => $leave]);
    }

    public function record()
    {
      //dd('ประวัติการลา');
      $leave = DB::table('users') //ประวัติการลา
      ->leftJoin('newcompanies', 'users.id', '=','newcompanies.idname')
      ->leftJoin('positions', 'newcompanies.newcode', '=','positions.codecom')
      ->leftJoin('leaves', 'positions.idchief', '=','leaves.head')
      ->where('status_hr','!=' ,'null')
      ->where('status_chief', '!=' ,'null')
      //->orderBy('idname','DESC')
      ->where('idname',Auth::user()->id)
      ->Paginate(100);
     //dd($leave);
      return view('hr.leaverecord' , ['leave' => $leave]);
    }

    public function search_leaves(Request $request)
    {
      //dd('ddd');
      $search = $request->get('search_leaves');

      
     
      $leave = DB::table('newcompanies') //ค้นหาประวัติการลา
      ->join('positions', 'newcompanies.newcode', '=','positions.codecom')
      ->join('leaves', 'positions.idchief', '=','leaves.head')
      ->where('status_hr', '!=' ,'Null')
      ->where('lea_fname','like', '%'.$search.'%')
      //->orderBy('leaves.id','DESC')
      ->where('idname',Auth::user()->id)
      ->Paginate(100);
     //dd($leave);
     //$search_id = $leave;
     //dd($search_id);
      return view('hr.leaverecord' , ['name'=> $search ,'leave' => $leave]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('hr.edithrfrom');
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
            'companyname'=> ['required', 'string', 'max:255'],
            'firstname'=> ['required', 'string', 'max:255'],
            'lastname'=> ['required', 'string', 'max:255'],
            'tel'=> ['required', 'numeric'],
            'address'=> ['required', 'string', 'max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'postalcode'=> ['required', 'numeric'],
            //'image'=> 'image|mimes:jpeg,png,jpg|max:2048'
         ]);
    
   //$image2 = $request->image;
   //dd($image2);
          $member = new Newcompanies;
          //dd($request->all());
             $member->idname = Auth::user()->id;
             $member->companyname = $request->companyname;
             $member->firstname = $request->firstname;
             $member->lastname = $request->lastname;
             $member->tel = $request->tel;
             $member->tel2 = $request->tel2;
             $member->address = $request->address;
             $member->city = $request->city;
             $member->postalcode = $request->postalcode;
             $member->newcode   = Str::random(10);
             $image = $request->file('image');
             
          if($request->hasFile('image') == '1'){
          //  dd('image');
             $image = $request->file('image');
           
              $image->move(public_path().'/img/profile/',$image->getClientOriginalName());
              $member->image=$image->getClientOriginalName();
            //  $member = $img->getClientOriginalExtension();
            //	$img->save();
            
            }else {
              $member->image = "icon_i2.png";
            }

    
         
   
   //dd($member);
             $member->save();
   
   
   
                 return redirect('/home');

        
    
  
         
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newcompanies  $newcompanies
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave, $id)
    {
      //dd($id);
      $chief = Leave::find($id);

      return view('hr.edit_upleave_hr', compact('chief','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newcompanies  $newcompanies
     * @return \Illuminate\Http\Response
     */
    public function edit(Newcompanies $newcompanies,$id)
    {
        //dd('asdasd');
      $ticket = Newcompanies::find($id);
      //  dd($ticket);
             return view('hr.edithrfrom', compact('ticket','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newcompanies  $newcompanies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newcompanies $newcompanies,$id)
    {
        // dd($request->all());
      $this->validate($request, [
        'companyname'=> ['required', 'string', 'max:255'],
        'firstname'=> ['required', 'string', 'max:255'],
        'lastname'=> ['required', 'string', 'max:255'],
        'tel'=> ['required', 'numeric'],
        'address'=> ['required', 'string', 'max:255'],
        'city'=> ['required', 'string', 'max:255'],
        'postalcode'=> ['required', 'numeric'],
        'image'=> 'image|mimes:jpeg,png,jpg|max:2048'
     ]);

//'idname', 'companyname','firstname','lastname','tle','tle2','address','city','postalcode','image','hashedRandomPassword'
       //$member = new Newcompanies::orderBy('idname')->where('idname', '=' ,Auth::user()->id)->get();
//dd($id);
    $member =  Newcompanies::find($id);
    //   dd($member);
          //$member->idname = Auth::user()->id;
          $member->companyname = $request->companyname;
          $member->firstname = $request->firstname;
          $member->lastname = $request->lastname;
          $member->tel = $request->tel;
          $member->tel2 = $request->tel2;
          $member->address = $request->address;
          $member->city = $request->city;
          $member->postalcode = $request->postalcode;
          //$member->newcode   = Str::random(10);

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
     * @param  \App\Newcompanies  $newcompanies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newcompanies $newcompanies)
    {
        //
    }
}
