<?php

namespace App\Providers;

use App\Dayoff;
use App\Overtime;
use App\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

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
    public function boot(Request $request)
    {
        //for admin layout
        $users = Users::count();
        $dayoff = Dayoff::select('id')
            ->where('status', '=', null)
            ->count();
        $overtime = Overtime::select('id')
            ->where('status', '=', null)
            ->count();
        $time = Carbon::now()->toDayDateTimeString();

        // for user layout

        view()->composer('*', function ($view) {
            $user_task = Overtime::where('user_id',Session::get('id'))->where('status',null)->count();
            $view->with('user_task', $user_task);
        });

        view()->share('users', $users);
        view()->share('dayoff', $dayoff);
        view()->share('overtime', $overtime);
        view()->share('time', $time);

    }
}
