<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $id = $request->session()->get('id');
        $data = Users::find($id);

        return view('user.password.password', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = Users::find($id);
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        

        if (Hash::check($old_password, $user->password)) {
            $request->validate([
                'new_password' => 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@#$!%*?&]{7,}$/',
                'confirm_password' => 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d#@$!%*?&]{7,}$/',
            ], [
                'new_password.regex' => 'Password minimum 7 character, at least one uppercase letter, one number and one special character',
                'confirm_password.regex' => 'Confirm password minimum 7 character, at least one uppercase letter, one number and one special character',

            ]);
            if ($old_password == $new_password) {
                $request->session()->flash('status', 'Old password must be difference new password');
                return redirect('password-user');
            }
            if ($new_password != $confirm_password) {
                $request->session()->flash('status', 'Confirm password must be same value with new password.');
                return redirect('password-user');
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
            if ($user->save()) {
                $request->session()->flash('status', 'Change password complete');
                $request->session()->flush();
                return redirect('login');
            }
            return redirect('password-user');
        } else {
            $request->session()->flash('status', 'Wrong password');
            return redirect('password-user');
        }
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
