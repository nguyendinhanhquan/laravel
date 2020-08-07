<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\DB;

class Admin
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
        $id = $request->session()->get('id');
        $users = DB::table('users_tbl')
            ->join('user_role_tbl', 'users_tbl.id', '=', 'user_role_tbl.user_id')
            ->select('users_tbl.id', 'user_role_tbl.role_id',)
            ->where('users_tbl.id',$id)
            ->get();
        $checkAdmin = $users[0]->role_id;
        if( $checkAdmin == 0){
            return $next($request);
        }
        else{
            return redirect('user_home');
        }
        
    }
}
