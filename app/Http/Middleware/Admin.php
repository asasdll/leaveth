<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = $request->user();
        if(Auth::check() && $user && $user->status === 'hr'){
                return $next($request);
              }elseif (Auth::check() && $user && $user->status === 'chief') {
                //dd($all);
                return redirect('chief');
              }elseif (Auth::check() && $user && $user->status === 'personnel') {
                return redirect('personnel');
              }else {
                return redirect('/');
              }
       }
     }