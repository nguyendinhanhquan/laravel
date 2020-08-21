<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Dayoff;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
  
    public function index()
    {
        //->orderBy('id','desc')
        $id = session('id');
        $data = Dayoff::where('user_id',$id)->get();
        return view('user.show_dayoff',['data'=>$data]);
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
    public function show()
    {
        //
        $id = session('id');
        $data = Users::where('id',$id)->get();
        return view('user.info',['data'=>$data]);
        
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
        $data = Users::find($id);
        return view('user.info_edit')->with('data',$data);
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
        //
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
        $user->note = $request ->input('note');
        $user->birthday = $birthday;
        $user->issue_date = $IDate;
        $user->start_job_at_company = $StartJob;
        
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'email:rfc,dns',
        ], [
        ]);
        
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $destinationPath = public_path().'/image/';
            $filename= '/image/'.$file->getClientOriginalName();;
            $file->move($destinationPath, $filename);
            $user->avatar=$filename;

        }else
        {
            //không pick hình thì lưu lại hình cũ
            $user->avatar = $user->avatar;
        }

        
        $user->save();

        //$id = $request->input('id');
        return redirect('user_info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
    }

  
}
