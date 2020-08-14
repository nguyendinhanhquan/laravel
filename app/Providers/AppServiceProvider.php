<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Users;
use App\Dayoff;
use App\Overtime;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $users = Users::count();
        $dayoff = Dayoff::select('id')
        ->where('status','=', null)
        ->count();
        $overtime = Overtime::select('id')
        ->where('status','=', null)
        ->count();
        $time = Carbon::now()->toDayDateTimeString();
        view()->share('users',$users);
        view()->share('dayoff',$dayoff);
        view()->share('overtime',$overtime);
        view()->share('time',$time);
        
    }
}
