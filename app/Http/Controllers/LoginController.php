<?php

namespace App\Http\Controllers;

use App\Users;
use App\User_Login;
use App\User_role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = new Users;
        if ($request->password == $request->password2) {
            $userCheck = Users::where('username', $request->username)->count();
            if ($userCheck > 0) {
                $request->session()->flash('status', 'Account already exists !!!');
                return redirect('register');
            } else {
                //------------------- Users_tbl ------------------
                $request->validate([
                    'username' => 'required',
                    'password' => 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,}$/',
                ], [
                    'username.required' => 'Name is required',
                    'password.regex' => 'Password must more 6 character, at least one uppercase letter, a normal letter, a number and a special character',
                ]);
                $user->fullname = $request->username;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);

                $filename = '../image/macdinh.jpg';
                $user->avatar = $filename;
                $user->phone = 'unknow';
                $user->address = 'unknow';
                $user->identity_card = 'unknow';
                $user->issue_place = 'unknow';
                $user->university = 'unknow';
                $user->year_of_graduate = 'unknow';
                $user->note = 'unknow';

                $user->save();

                //save session uesername & id
                $user = Users::where('username', $request->username)->get();
                $request->session()->put('id', $user[0]->id);
                $request->session()->put('username', $request->username);

                //------------------- User_role_tbl ------------------
                $userRole = new User_role;
                $userRole->role_id = 1;
                $userRole->user_id = $user[0]->id;
                $userRole->status = 1;
                $userRole->save();

                return redirect('login');
            }

        } else {
            $request->session()->flash('status', 'Wrong confirm password !!!');
            return redirect('register');
        }
    }

    public function login(Request $request)
    {
        $user = Users::where('username', $request->username)->get();
        if ($user->isEmpty()) {
            $request->session()->flash('status', 'This username not valid !!!');
            return redirect('login');
        } else {
            if (Hash::check(($request->password), ($user[0]->password))) {
                $userStatus = User_role::where('user_id', $user[0]->id)->get();
                if ($userStatus[0]->status === 1) {
                    $request->session()->put('username', $request->username);
                    $request->session()->put('id', $user[0]->id);

                    $login_time = Carbon::now()->toDateTimeString();
                    $userLogin = new User_Login();
                    $userLogin->user_id = $user[0]->id;
                    $userLogin->login_time = $login_time;
                    $userLogin->ip_login = $request->getClientIp(true);
                    $userLogin->save();

                    return redirect('home');
                } else {
                    $request->session()->flash('status', 'Your account has been disabled !!!');
                    return redirect('login');
                }

            } else {
                $request->session()->flash('status', 'Wrong username or password !!!');
                return redirect('login');
            }
        }
    }

    public function logout(Request $request)
    {
        
        $userLogin = User_Login::latest()->orderBy('id', 'DESC')->first();
        $logout_time = Carbon::now()->toDateTimeString();
        $userLogin->logout_time = $logout_time;
        $userLogin->save();
        $request->session()->flush();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
