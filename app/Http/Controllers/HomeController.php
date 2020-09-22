<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Memberuser;
use App\Newcompanies;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //dd('sss');

    $user = request()->User();
        
        if ($user && $user->status === 'hr') {

        ///----เช็คว่า กรองข้อมูบบริษัทยัง----//

        $hrbumble = Newcompanies::orderBy('idname')->where('idname', '=' ,Auth::user()->id)->get();

       if(Count($hrbumble) == 0) {
        return view('.hr.hrfrom');
          //dd('ยังไม่ข้อมูล');
    //  return view('./hr',$date);
        // dd($users);
      }elseif(Count($hrbumble) == 1){

         //dd($hrbumble);
        return view('hr', ['hrbumble' => $hrbumble]);
      }else {
        return view('/');
      }
      

        }if ($user && $user->status === 'chief') {

            $user = request()->User();
            if ($user && $user->status === 'chief') {
    
              $users = Memberuser::orderBy('iduser')->where('iduser', '=' ,Auth::user()->id)->get();
    
             //dd($users);
                 if(Count($users) === 0) {
    
                   return view('.chief.chieffrom');
    
                 }else{
                //
                // dd($users);
              

                  return view('chief', ['users' => $users]);
                 }
              //dd($user);
            }else {
              return redirect('/');
            }
            
        } else {

            $user = request()->User();
            if ($user && $user->status == 'personnel') {
      
                  $userspe = Memberuser::orderBy('iduser')->where('iduser', '=' ,Auth::user()->id)->get();
      
                  if(Count($userspe) === 0) {
      
                    return view('.chief.chieffrom');
      
                  }else{
                 //
                 // dd($users);
                   return view('personnel',['userspe' => $userspe]);
                  }
            //  return view('personnel');
      
            }else {
              return redirect('/');
            }
      
        }
    }

}
