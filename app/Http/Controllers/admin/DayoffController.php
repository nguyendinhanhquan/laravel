<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Dayoff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DayoffController extends Controller
{

    public function approve(Request $request, $id)
    {
        //
        $user = Dayoff::find($id);
        $user->status = 1;
        $user->save();
        return redirect('dayoff');
    }

    public function reject(Request $request, $id)
    {
        //
        $user = Dayoff::find($id);
        $user->status = 0;
        $user->save();
        return redirect('dayoff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('users_tbl')
            ->join('dayoff_tbl', 'users_tbl.id', '=', 'dayoff_tbl.user_id')
            ->select('users_tbl.fullname', 'dayoff_tbl.*')
            ->get();
        return view('admin.dayoff.dayoff',['data'=>$data]);
    }

    public function confirm(Request $request)
    {
        //
        $id = $request->route('id');
        $data = DB::table('users_tbl')
            ->join('dayoff_tbl', 'users_tbl.id', '=', 'dayoff_tbl.user_id')
            ->select('users_tbl.fullname', 'dayoff_tbl.*')
            ->where('dayoff_tbl.id',$id)
            ->get();
        return view('admin.dayoff.show_dayoff_confirm',['items'=>$data]);
    }


    public function indexDayOffToYear()
    {
        //
        $data = DB::table('users_tbl')
            ->join('dayoff_tbl', 'users_tbl.id', '=', 'dayoff_tbl.user_id')
            ->select( DB::raw('
            fullname,
            YEAR(start_date) as year , 
            SUM(number_day_off) AS totalDay'))
            ->groupBy('year','fullname')
            ->get();
        return view('admin.dayoff.show_dayoff_to_year',['data'=>$data]);
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
    public function update(Request $request)
    {
        //
        $dayoff = Dayoff::find($request->id);

        if($request->status == 'approve')
        {
            $dayoff->status = 1;
            $dayoff->save();
            return redirect('dayoff');
        }else
        {
            $dayoff->status = 0;
            $dayoff->save();
            return redirect('dayoff');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        //
        $record = Dayoff::destroy($id);
        if($record){
            $request->session()->flash('status','Delete successful');
            return redirect('dayoff');
        }else
        {
            $request->session()->flash('status','Delete fail');
            return redirect('dayoff');
        }
    }
}
