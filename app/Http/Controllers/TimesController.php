<?php

namespace App\Http\Controllers;

use App\Times;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class TimesController extends Controller
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
    
    public function index()
    {
        return view('.chief.timestamp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       /* $mac='UNKNOWN';
        foreach(explode("\n",str_replace(' ','',trim(`getmac`,"\n"))) as $i)
        if(strpos($i,'Tcpip')>-1){$mac=substr($i,0,17);break;}*/
       // Example use of getenv()
       // ฟังก์ชันสำหรับหา IP Address 
    
        $mac = $_SERVER['REMOTE_ADDR'];
            
        //dd($ip);

      $reg = DB::table('addmacs')->orderBy('addmac')->where('addmac', '=' ,$mac)

   ->get();
//dd($reg);
      if (Count($reg) == 1) {
        $regt = DB::table('times')
            ->where('user_id', '=' ,Auth::user()->id)
            ->whereNull('time_out')
            ->orderBy('id','DESC')
            ->get();           //------เช็คว่า 'user_id', '=' ,Auth::user()->id ตาราง time_out ล่าสุดมามีข้อมูลใหม
     //dd($regt);
            if(Count($regt) == 1){
            //dd($regt);
                    $regy = Times::first()
                    ->orderBy('id', 'DESC')
                    ->where('user_id', '=' ,Auth::user()->id)
                    ->whereNull('time_out')
                    ->first();
                    $regy->time_out = date("H:i:s", time());
                  //  dd( $regy);
                    $regy->save();

                  return redirect('timestampch')->with('successv','บันทึกเวลาออกเรียบร้อย');

                   }else{

                    $regu = new Times;
                    $regu->user_id = Auth::user()->id;
		            $regu->time_date = date("Y-m-d", time());
                    $regu->time_in = date("H:i:s", time());
                   //dd($regu);
                    $regu->save();

                  return redirect('timestampch')->with('success','บันทึกเวลาเข้าเรียบร้อย');
            }

                    } else {
                        return redirect('timestampch')->with('successh','คุณยังไม่ได้ต่อ  WIFI');
                    }



                        //  }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function show(Times $times)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function edit(Times $times)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Times $times)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function destroy(Times $times)
    {
        //
    }
}
