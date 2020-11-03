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
                        ->where('positions.id_user', '=' ,Auth::user()->id)
                        ->where('firstnamebem','like', '%'.$search.'%')
                        ->get();  

                    
              // dd($add_date); 
        
        
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

           //dd(55);
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


       
       // dd($member);
      $member->save();

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
