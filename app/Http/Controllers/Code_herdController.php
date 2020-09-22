<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memberuser;
use DB;
class Code_herdController extends Controller
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
    public function store(Request $request,$id)
    {
       
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
        //
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
        ///dd('111');
        
        $Number  = $request->code_herd;
        $reg = DB::table('positions')->orderBy('herd_code')->where('herd_code', '=' ,$Number)->get();
        
        if (Count($reg) == '1') {
            # code...
            $this->validate($request, [
                'code_herd'=> ['required', 'string', 'max:255'],
               
             ]);
             //dd($request->all());
                     $member =  Memberuser::find($id);
                    $member->code_herd = $request->code_herd;
                //dd($member);
                    $member->save();
                    return redirect('/leave2');

        }else {
            # code...
            return redirect('/leave2')->with('success', 'กรุณาตตรวจสอบรหัสใหม่อีกครั้ง !!!');
        }

         
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