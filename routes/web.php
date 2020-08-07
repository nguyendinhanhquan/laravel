<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['customAuth']], function () {
    //Login - Logout - Register
    Route::view('login','login');
    Route::view('register','register');
    Route::get('logout','LoginController@logout');
    Route::post('register','LoginController@register');
    Route::post('login','LoginController@login');

    //============================ Users =================================
    Route::view('user_home','user.home');
    Route::view('user_info','user.info');
    Route::get('user_info','UserController@show');
    Route::get('user_edit/{id}','UserController@edit');
    Route::post('user_edit/user_update','UserController@update');

    //User Overtime
    Route::view('new-task', 'user.overtime.new_task');
    Route::post('new_task','user\OvertimeController@store');
    Route::get('my-task','user\OvertimeController@index');
    Route::get('my-task/delete/{id}','user\OvertimeController@destroy');
    Route::get('my-task/{id}','user\OvertimeController@show');
    Route::get('total-time','user\OvertimeController@total');

    //User Dayoff
    Route::view('user-new-dayoff','user.dayoff.new_dayoff');
    Route::get('user_show_dayoff_to_month','user\DayoffController@month');
    Route::get('user_show_dayoff_to_year','user\DayoffController@year');
    Route::get('user_show_dayoff','user\DayoffController@index');
    Route::get('user_show_dayoff/delete/{id}','user\DayoffController@destroy');
    Route::post('user_create_dayoff','user\DayoffController@store');

    //============================ admin ====================================

    Route::group(['middleware' => ['admin']], function () {
        //Admin 
        Route::get('home','AdminController@home');
        Route::get('admin', 'AdminController@adminInfo');

        //Staff
        Route::post('edit/update','AdminController@update');
        Route::get('edit/{id}','AdminController@edit');
        Route::get('user','AdminController@index');
        Route::get('user/{id}','AdminController@show');
        Route::get('user/active/{id}','AdminController@active');
        Route::get('user/disable/{id}','AdminController@disable');

        //Admin Overtime
        Route::get('list-task','admin\OvertimeController@index');
        Route::get('list-task/delete/{id}','admin\OvertimeController@destroy');
        Route::post('list-task/confirm','admin\OvertimeController@update');
        Route::get('total-overtime','admin\OvertimeController@total');
        Route::get('list-task/{id}','admin\OvertimeController@show');

        //Admin Dayoff
        Route::get('dayoff/{id}/yes','admin\DayoffController@approve');
        Route::get('dayoff/{id}/no','admin\DayoffController@reject');
        Route::get('dayoff/delete/{id}','admin\DayoffController@destroy');
        Route::get('dayoff','admin\DayoffController@index');
        Route::post('dayoff/confirm','admin\DayoffController@update');
        Route::get('dayoff_to_year','admin\DayoffController@indexDayOffToYear');
        Route::get('dayoff/{id}','admin\DayoffController@confirm');

        //Salary
        Route::get('salary','admin\SalaryController@index');

        
    });

});


