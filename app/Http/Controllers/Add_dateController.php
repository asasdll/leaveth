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
    public function index(Request $request)
    {
        $search = $request->get('search');
        $add_date = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('positions', 'memberusers.code_herd', '=','positions.herd_code')
                ->where('positions.idchief', '=' ,Auth::user()->id)
                ->where('firstnamebem','like', '%'.$search.'%')
                ->get();  
        //dd($add_date); 


        return view('chief.add_date' ,['add_date' => $add_date]);
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
        //dd($id);
        $name_la = $request->name_lv;
        $date_la = $request->date_add;

       //dd($request->all(),$date_la);
        $date_up = DB::table('add_date')
                ->where('data_name', '=' ,$name_la)
                ->where('id_user','=', $id)
                ->get();

      


       // dd($date_up,$date_id);  

        if (Count($date_up) == '1') {
            $date_id = $date_up[0]->id; 
            $affected = DB::table('add_date')
                    ->where('id', $date_id)
                    ->update([ 'date_up' => $date_la]);
            # code...
        }else {
            # code...
            //dd('sss');
            DB::table('add_date')->insert(
                ['id_user' => $id,'data_name' => $name_la, 'date_up' => $date_la]
            );
        }
        return redirect('add_date')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function show(Add_date $add_date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function edit(Add_date $add_date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Add_date  $add_date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Add_date $add_date)
    {
        //
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
