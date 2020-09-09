<?php

namespace App\Http\Controllers;

use App\Addmac;
use Illuminate\Http\Request;
use Auth;

class AddmacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mac = $_SERVER['REMOTE_ADDR'];
    
          return view('hr.newmacaddress' ,['mac' => $mac]);
    }

    public function mac()
    {
       $addmac = Addmac::orderBy('idname')->where('idname', '=' ,Auth::user()->id)->get();
     //dd($addmac);
      return view('hr.macaddress',['addmac' => $addmac]);
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
        //dd('syore');
        $this->validate($request, [
            'addmac'=> ['required', 'string', 'max:255'],
              'name'=> ['required', 'string', 'max:255'],
         ]);
    
    //'idname', 'companyname','firstname','lastname','tle','tle2','address','city','postalcode','image','hashedRandomPassword'
           $member = new Addmac;
           //dd($request->all());
              $member->idname = Auth::user()->id;
              $member->addmac = $request->addmac;
              $member->name = $request->name;
    //dd($member);
              $member->save();
    
                  return redirect('mac');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Addmac  $addmac
     * @return \Illuminate\Http\Response
     */
    public function show(Addmac $addmac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Addmac  $addmac
     * @return \Illuminate\Http\Response
     */
    public function edit(Addmac $addmac , $id)
    {
        $ticket = Addmac::find($id);
    //  dd($ticket);
           return view('hr.editmacaddress', compact('ticket','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Addmac  $addmac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addmac $addmac, $id)
    {
        $this->validate($request, [
            'addmac'=> ['required', 'string', 'max:255'],
            //'image'=> 'image|mimes:jpeg,png,jpg|max:2048'
         ]);
    
    //'idname', 'companyname','firstname','lastname','tle','tle2','address','city','postalcode','image','hashedRandomPassword'
           $member = Addmac::find($id);;
           //dd($request->all());
            ///  $member->idname = Auth::user()->id;
              $member->addmac = $request->addmac;
              $member->name = $request->name;
    //dd($member);
              $member->save();
    
                  return redirect('mac');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Addmac  $addmac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addmac $addmac ,$id)
    {
        $reg = Addmac::find($id);
        $reg->delete();
        //session::flash('massage','ลบข้อมูลเรียบร้อยเเล้ว');
        return redirect('mac');
    }
}
