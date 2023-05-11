<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\frontuser;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */

    /*
    public function handle(Request $request, Closure $next, ...$guards)
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            //dd($guard);
            /////Redirect on dashboard page if logged-in user hit login admn url
            //dd(Auth::guard($guard)->check());
            if (Auth::guard('auth')->check()) {
                //return redirect(RouteServiceProvider::HOME);
                return redirect('admin/dashboard');
            }
        }

        return $next($request);
    }
    */

    
    public function handle(Request $request, Closure $next, ...$guards)
    {

        /////Redirect on dashboard page if logged-in user hit login admn url
        if (Auth::check()) {            
            return redirect()->route('dashboard');            
        }  
        elseif (Auth::guard('frontuser')->check()) {
            return redirect()->route('getstep1');            
        } 
              

        return $next($request);
    }


}
