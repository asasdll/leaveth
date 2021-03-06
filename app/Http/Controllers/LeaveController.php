<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Response;
use PDF;

class LeaveController extends Controller
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

    public function canvassch()
    {
            //dd('ddd');
        return view('chief.canvass');
    }

    
    public function log_out()
    {
        //dd('ddd');
        return view('layouts.logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf_leave($name)
    {

   //dd($name);
      $user_aaa = DB::table('newcompanies') //pdf_leave
      ->join('positions', 'newcompanies.newcode', '=','positions.codecom')
      ->join('leaves', 'positions.idchief', '=','leaves.head')
      ->where('status_hr', '!=' ,'Null')
      ->orderBy('leaves.id','ASC')
      ->where('lea_fname', 'like', '%'.$name.'%')
      ->where('idname',Auth::user()->id)
      
       ->get();

       $image_user = DB::table('users')
       ->join('newcompanies', 'users.id', '=','newcompanies.idname')
       ->where('idname',Auth::user()->id)
       ->get();
       //dd($user_aaa);
      $pdf = PDF::loadview('hr.pdf_leave',['image_user'=> $image_user ,'user_aaa'=> $user_aaa]);
     return @$pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

   // dd($request->all());
        $user = request()->User();
        if ($user && $user->status === 'chief') {
           
            $namdate1 = request()->from1;
       //dd($namdate1);
        if ($namdate1 != null) {
            # code...el
            $this->validate($request, [
                'image'=> ['required','mimes:jpg,png,jpeg,gif,svg'],

                
             ]);

            $date1 = request()->from1;
            $date2 = request()->to1;
            $da = request()->daydiff1;
            $datoo = request()->datoo1;
            //dd('ลาป่วย',$date1,$date2,$da);
        }else {
            # code...
            $date1 = request()->from2;
            $date2 = request()->to2;
            $da = request()->daydiff2;
            $datoo = request()->datoo2;
            //dd('ลากิจ/พักร้อน',$date1,$date2,$da,$request->all());
        }
    //dd( $datoo );
        if ($datoo === 'ลาครึ่งเช้า') {
           // dd('มี');
            $a = 0.5;

            $da = $da - $a;
        }elseif ($datoo === 'ลาครึ่งบาย') {
            # code...
            $a = 0.5;

            $da = $da - $a;
        }


       //dd($request->all());
              //dd($request->all());
              $this->validate($request, [
                'affair'=> ['required', 'string', 'max:255'],
                'leave' => ['required', 'string', 'max:255'],
                'since' => ['required', 'string', 'max:255'],
                //'date1' => ['required', 'string', 'max:255'],
                //'date2' => ['required', 'string', 'max:255'],
                //'da' => ['required', 'string', 'max:255'],

                
             ]);
    
             $member = new Leave;       
                 $member->idmember = Auth::user()->id;
                 $member->affair = $request->affair;
                 $member->head = $request->head;
                 $member->lea_fname = $request->lea_fname;
                 $member->lea_lname = $request->lea_lname;
                 $member->lea_niname = $request->lea_niname;
                 $member->leave = $request->leave;
                 $member->since = $request->since;
                 $member->date1 = $date1;
                 $member->date2 = $date2;
                 $member->da = $da;
                 $member->datoo = $datoo;
                 $member->address = $request->address;
                 $member->tel = $request->tel;
                 $member->status_chief = 'อนุมัติ';
                 $member->status_text1 = 'อนุมัติ';
                 /*$member->status_hr = $request->status_hr;
                 $member->status_text2 = $request->status_text2;*/
                
                 if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image->move(public_path().'/img/file/',$image->getClientOriginalName());
                    $member->image=$image->getClientOriginalName();
                  //  $member = $img->getClientOriginalExtension();
                  //	$img->save();
                }
            //dd($member);
                $save_data0 = $request->leave;
                $add_date = DB::table('users')
                        ->join('memberusers', 'users.id', '=','memberusers.iduser')
                        ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
                        ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                        ->join('sum_top', 'newcompanies.id', '=','sum_top.id_com')
                        ->leftJoin('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                        ->leftJoin('sum_add_date', 'memberusers.iduser', '=','sum_add_date.id_u')
                        ->where('memberusers.iduser',Auth::user()->id)
                        ->get();

                        ///dd(  $add_date);
                    $per =   $add_date[0]->personalleave_date;
                    $up_per = $add_date[0]->personal_date;
                    $sum_per = $per +  $up_per;

                    $vac =   $add_date[0]->vacationleave_date;
                    $up_vac = $add_date[0]->vacation_date;
                    $sum_vac = $vac +  $up_vac;

               //dd($save_data0, $sum_vac);
                if ($save_data0 == 'ลาป่วย') {
                    # code...Eเเ
                   // dd('ลาป่วย');
                    $member->save();
                   /* $save_data01 = $save_data[0]->leave_date_surplus;
                            if ($save_data01 == 0) {
                                # code...e
                                //dd('ไม่ได้');
                                return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                            }else {
                                # code...
                               // dd('ได้');
                                $member->save();
                            }*/
                    
                }else {

                    if ($save_data0 == 'ลากิจ') {
                        dd('dasd');
                        if ($sum_per  > 0) {
                            # code...e
                           // dd('dasd');
                            $member->save();
                           // return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                        }else {
                            # code...
                           dd('ไน้อย');
                           return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                           // $member->save();
                        }
                        
                    }else {
                        # code...
                        if ($sum_vac  > 0) {
                            # code...e
                            $member->save();
                           // return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                        }else {
                            # code...
                         //  dd('ไน้อย');
                           return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                           // $member->save();
                        }
                        
                    }
                }

                
             return redirect('recordch');
        }else {
            # code...
            $namdate1 = request()->from1;
            //dd($namdate1);
             if ($namdate1 != null) {
                 # code...el
                 $this->validate($request, [
                     'image'=> ['required','mimes:jpg,png,jpeg,gif,svg'],
     
                     
                  ]);
     
                 $date1 = request()->from1;
                 $date2 = request()->to1;
                 $da = request()->daydiff1;
                 $datoo = request()->datoo1;
                 //dd('ลาป่วย',$date1,$date2,$da);
             }else {
                 # code...
                 $date1 = request()->from2;
                 $date2 = request()->to2;
                 $da = request()->daydiff2;
                 $datoo = request()->datoo2;
                 //dd('ลากิจ/พักร้อน',$date1,$date2,$da,$request->all());
             }

             if ($datoo === 'ลาครึ่งเช้า') {
                //dd('มี');
                $a = 0.5;
    
                $da = $da - $a;
            }elseif ($datoo === 'ลาครึ่งบาย') {
                # code...
                $a = 0.5;
    
                $da = $da - $a;
            }
            // dd($request->all());
                   //dd($request->all());
                   $this->validate($request, [
                     'affair'=> ['required', 'string', 'max:255'],
                     'leave' => ['required', 'string', 'max:255'],
                     'since' => ['required', 'string', 'max:255'],
                     //'date1' => ['required', 'string', 'max:255'],
                     //'date2' => ['required', 'string', 'max:255'],
                     //'da' => ['required', 'string', 'max:255'],
     
                     
                  ]);
         
                  $member = new Leave;       
                      $member->idmember = Auth::user()->id;
                      $member->affair = $request->affair;
                      $member->head = $request->head;
                      $member->lea_fname = $request->lea_fname;
                      $member->lea_lname = $request->lea_lname;
                      $member->lea_niname = $request->lea_niname;
                      $member->leave = $request->leave;
                      $member->since = $request->since;
                      $member->date1 = $date1;
                      $member->date2 = $date2;
                      $member->da = $da;
                      $member->datoo = $datoo;
                      $member->address = $request->address;
                      $member->tel = $request->tel;
                      /*$member->status_chief = $request->status_chief;
                      $member->status_text1 = $request->status_text1;
                      $member->status_hr = $request->status_hr;
                      $member->status_text2 = $request->status_text2;*/
                     
                      if($request->hasFile('image')){
                         $image = $request->file('image');
                         $image->move(public_path().'/img/file/',$image->getClientOriginalName());
                         $member->image=$image->getClientOriginalName();
                       //  $member = $img->getClientOriginalExtension();
                       //	$img->save();
                     }

                     $save_data0 = $request->leave;
                     $add_date = DB::table('users')
                     ->join('memberusers', 'users.id', '=','memberusers.iduser')
                     ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
                     ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                     ->join('sum_top', 'newcompanies.id', '=','sum_top.id_com')
                     ->leftJoin('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                     ->leftJoin('sum_add_date', 'memberusers.iduser', '=','sum_add_date.id_u')
                     ->where('memberusers.iduser',Auth::user()->id)
                     ->get();
                     //ลากิจ
                     $pe_top =   $add_date[0]->personalleave_date;
                     $pe_top2 =   $add_date[0]->personal_date;
                     $per2 =  $pe_top + $pe_top2;
                     $pe_sl =   $add_date[0]->per_date_surplus;
                     if ($pe_sl == '1') {
                         # code...
                         $pe_sl =   $add_date[0]->per_date_surplus;
                     }else {
                         # code...
                         $pe_sl =  '0';
                     }
                     $pel = $pe_sl + $da;
                     // ลาพักร้อน
                     $vac_top =   $add_date[0]->vacationleave_date;
                     $vac_top2 =   $add_date[0]->vacation_date;
                     $vac2 =  $vac_top + $vac_top2;
                    $vac =   $add_date[0]->vac_date_surplus;
                    if ($vac == '1') {
                        # code...
                        $vac =   $add_date[0]->vac_date_surplus;
                    }else {
                        # code...
                        $vac =  '0';
                    }
                    $vacl = $da + $vac;

            //dd($vacl);
             if ($save_data0 == 'ลาป่วย') {
                 # code...Eเเ
                // dd('ลาป่วย');
                 $member->save();
  
                 
             }else {

                 if ($save_data0 == 'ลากิจ') {
                    //dd($pel);
                     if ($pel  <= $per2) {
                         # code...e
                       //  dd('ss');
                         $member->save();
                        // return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                     }else {
                         # code...
                      // dd('ไน้อย');
                        return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                        // $member->save();
                     }
                     
                 }else {
                     # code...
                     if ($vacs  <= $vac2) {
                         # code...e
                         $member->save();
                        // return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                     }else {
                         # code...
                      //dd('ไน้อย');
                        return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                        // $member->save();
                     }
                     
                 }
             }
                     
             return redirect('leave3');
        }
        
               


             //dd($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave, $id)
    {
    
          $chief = Leave::find($id);

          return view('chief.edit_upleave_chief ', compact('chief','id'));


        
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave, $id)
    {

       // dd('55');

          $position = DB::table('positions')

           ->get();
    
  
    
            $leave = DB::table('leaves_tops') // ประเภทการลา
            ->get();
         // dd('editl');
          $chief = Leave::find($id);
      //dd($chief);
             return view('personnel.editleave2', compact('chief','id'),['position'=> $position , 'leave'=> $leave]);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave, $id)
    {
     
        //dd($request->all());
        $this->validate($request, [
          'affair'=> ['required', 'string', 'max:255'],
          'leave' => ['required', 'string', 'max:255'],
          'since' => ['required', 'string', 'max:255'],
          
          
       ]);
       $namdate1 = request()->from1;
       //dd($namdate1);
        if ($namdate1 != null) {
            # code...el
            $this->validate($request, [
                'image'=> ['required','mimes:jpg,png,jpeg,gif,svg'],

                
             ]);

            $date1 = request()->from1;
            $date2 = request()->to1;
            $da = request()->daydiff1;
            $datoo = request()->datoo1;
            //dd('ลาป่วย',$date1,$date2,$da);
        }else {
            # code...
            $date1 = request()->from2;
            $date2 = request()->to2;
            $da = request()->daydiff2;
            $datoo = request()->datoo2;
            //dd('ลากิจ/พักร้อน',$date1,$date2,$da,$request->all());
        }

        if ($datoo === 'ลาครึ่งเช้า') {
           //dd('มี');
           $a = 0.5;

           $da = $da - $a;
       }elseif ($datoo === 'ลาครึ่งบาย') {
           # code...
           $a = 0.5;

           $da = $da - $a;
       }


       $member = Leave::find($id);     
           $member->idmember = Auth::user()->id;
           $member->affair = $request->affair;
           $member->head = $request->head;
           $member->leave = $request->leave;
           $member->since = $request->since;
           $member->date1 = $date1;
           $member->date2 = $date2;
           $member->da = $da;
           $member->datoo = $datoo;
           $member->address = $request->address;
           $member->tel = $request->tel;
          
           if($request->hasFile('image')){
              $image = $request->file('image');
              $image->move(public_path().'/img/file/',$image->getClientOriginalName());
              $member->image=$image->getClientOriginalName();
            //  $member = $img->getClientOriginalExtension();
            //	$img->save();
          }
          
//dd($member);
                $save_data0 = $request->leave;
                $add_date = DB::table('users')
                ->join('memberusers', 'users.id', '=','memberusers.iduser')
                ->join('positions', 'memberusers.pass_division', '=','positions.code_division')
                ->join('newcompanies', 'memberusers.code', '=','newcompanies.newcode')
                ->join('sum_top', 'newcompanies.id', '=','sum_top.id_com')
                ->leftJoin('sum_date', 'memberusers.iduser', '=','sum_date.user_id')
                ->leftJoin('sum_add_date', 'memberusers.iduser', '=','sum_add_date.id_u')
                ->where('memberusers.iduser',Auth::user()->id)
                ->get();
                //ลากิจ
                $pe_top =   $add_date[0]->personalleave_date;
                $pe_top2 =   $add_date[0]->personal_date;
                $per2 =  $pe_top + $pe_top2;
                $pe_sl =   $add_date[0]->per_date_surplus;
                if ($pe_sl == '1') {
                    # code...
                    $pe_sl =   $add_date[0]->per_date_surplus;
                }else {
                    # code...
                    $pe_sl = '0';
                }
                $pel = $pe_sl + $da;
                // ลาพักร้อน
                $vac_top =   $add_date[0]->vacationleave_date;
                $vac_top2 =   $add_date[0]->vacation_date;
                $vac2 =  $vac_top + $vac_top2;
                $vac =   $add_date[0]->vac_date_surplus;
                if ($vac == '1') {
                    # code...
                    $vac =   $add_date[0]->vac_date_surplus;
                }else {
                    # code...
                    $vac =   '0';
                }
                $vacl = $da + $vac;

               // dd($vac);
                if ($save_data0 == 'ลาป่วย') {
                # code...Eเเ
                // dd('ลาป่วย');
                $member->save();


                }else {

                if ($save_data0 == 'ลากิจ') {
                //dd($pel);
                if ($pel  <= $per2) {
                    # code...e
                //  dd('ss');
                    $member->save();
                // return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                }else {
                    # code...
                // dd('ไน้อย');
                return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                // $member->save();
                }

                }else {
                # code...
                if ($vacs  <= $vac2) {
                    # code...e
                    $member->save();
                // return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                }else {
                    # code...
                //dd('ไน้อย');
                return redirect('leave2')->with('success', "วัน $save_data0 ของคุณไม่พอ");
                // $member->save();
                }

                }
                }

                return redirect('leave3');

      
           
       
       //dd($data);
    
      
         
    }



      

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}