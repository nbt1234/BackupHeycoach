<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\frontuser;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        //dd($request->segment(1));       
        /////Redirect on Login page if Non-logged-in user hit Dashboard url
        if (! $request->expectsJson()) {
            
            return route('login');
            
            // if($request->segment(1) == 'admin'){
            //     //dd($request->segment(1));
            //     //return redirect()->route('login');
            //     return redirect()->route('login');            
            // } else {

            //     //return redirect()->route('frontend.signin');
            //     return redirect()->route('frontend.signin');
            // }
            


        }

        
        
    }
}
