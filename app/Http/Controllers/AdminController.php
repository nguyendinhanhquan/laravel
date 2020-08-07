<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Users;
use App\User_role;
use App\Dayoff;
use App\Overtime;


class AdminController extends Controller
{
    public function home()
    {
        $users = Users::count();
        $dayoff = Dayoff::select('id')
        ->where('status','=', null)
        ->count();
        $overtime = Overtime::select('id')
        ->where('status','=', null)
        ->count();
        $time = Carbon::now()->toDayDateTimeString();;
        return view('admin.home',
        [
            'users'=>$users,
            'dayoff'=>$dayoff,
            'overtime'=>$overtime,
            'time'=>$time
        ]);
    }

    public function active($id)
    {
        $user = User_role::find($id);
        $user->status = 1;
        $user->save();
        return redirect('user/'.$id);
    }

    public function disable($id)
    {
        $user = User_role::find($id);
        $user->status = 0;
        $user->save();
        return redirect('user/'.$id);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //List Staff
    public function index()
    {
        //
        $users = DB::table('users_tbl')
            ->join('user_role_tbl', 'users_tbl.id', '=', 'user_role_tbl.user_id')
            ->select('users_tbl.*', 'user_role_tbl.status',)
            ->get();
        return view('admin.user.user_list',['users'=>$users]);
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
    public function show(Request $request)
    {

        $id = $request->route('id');
        $users = DB::table('users_tbl')
            ->join('user_role_tbl', 'users_tbl.id', '=', 'user_role_tbl.user_id')
            ->select('users_tbl.*', 'user_role_tbl.status',)
            ->where('users_tbl.id',$id)
            ->get();
        return view('admin.user.user_info',['item'=>$users]);
  
    }

    public function adminInfo()
    {
        $id = session('id');
        $users = Users::find($id);
        return view('admin.admin_info',['item'=>$users]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $id)
    {
        $data = Users::find($id);

        return view('admin.user.user_edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $user = Users::find($request->id); 
        $birthday = $request->input('birthday');
        $IDate = $request->input('IDate');
        $StartJob =  $request->input('StartJob');

        $birthday = date_format(date_create($birthday),'Y-m-d');
        $IDate = date_format(date_create($IDate),'Y-m-d H:i:s');
        $StartJob = date_format(date_create($StartJob),'Y-m-d H:i:s');

        $user->fullname = $request->input('fullname');
        $user->email = $request ->input('email');
        $user->phone = $request ->input('phone');
        $user->address = $request ->input('address');
        $user->identity_card = $request ->input('IDCard');
        $user->issue_place = $request ->input('IPlace');
        $user->university = $request ->input('university');
        $user->year_of_graduate = $request ->input('YOG');
       // $user->avatar = $request ->input('avatar');
        $user->note = $request ->input('note');
        $user->birthday = $birthday;
        $user->issue_date = $IDate;
        $user->start_job_at_company = $StartJob;
        
        
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $destinationPath = public_path().'/image/';
            $filename= '../image/'.$file->getClientOriginalName();;
            $file->move($destinationPath, $filename);
            $user->avatar=$filename;

        }else
        {
            //không pick hình thì lưu lại hình cũ
            $user->avatar = $user->avatar;
        }

        
        $user->save();

        $id = $request->input('id');
        if($id == 1){
            return redirect('admin');
        }else
        {
            return redirect('user/' .$id);
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
