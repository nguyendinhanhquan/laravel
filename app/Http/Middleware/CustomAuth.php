<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        
        if( ($path == 'login' || $path == 'register') && $request->session()->has('username') ){
            return redirect('home');
            
        }else if( ($path != 'login')  && (!$request->session()->has('username')) && ($path != 'register')  && (!$request->session()->has('username')) )  
        {
            return redirect('login');
        }

        return $next($request);
    }
}
