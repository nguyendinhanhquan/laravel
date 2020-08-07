<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Overtime;
use Carbon\Carbon;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        //
        // $id = session('id');
        // $data = DB::table('overtime_tbl')
        // ->select( DB::raw('
        // YEAR(date_ot) as year , 
        // MONTH(date_ot) as month , 
        // SUM(total_time) AS total'))
        // ->groupBy('year','month')
        // ->get();
        // return view('user.overtime.total_time',['data'=>$data]);


        $data = DB::table('users_tbl')
            ->join('overtime_tbl', 'users_tbl.id', '=', 'overtime_tbl.user_id')
            ->select( DB::raw('
            fullname,
            YEAR(date_ot) as year , 
            MONTH(date_ot) as month , 
            SUM(total_time) AS total'))
            ->where('status',1)
            ->groupBy('year','month','fullname')
            ->get();

        return view('admin.overtime.total_time',['data'=>$data]);
    }

    public function index()
    {
        //
        // $data = Overtime::get();
        // return view('user.overtime.my_task',['data'=>$data]);

        $data = DB::table('users_tbl')
            ->join('overtime_tbl', 'users_tbl.id', '=', 'overtime_tbl.user_id')
            ->select('users_tbl.fullname', 'overtime_tbl.*')
            ->get();
        return view('admin.overtime.list_task',['data'=>$data]);
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
        $data = Overtime::where('id',$id)->get();
        return view('admin.overtime.list_task_detail',['data'=>$data]);
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
        $overtime = Overtime::find($request->id);

        $overtime->feedback = $request->feedback;

        if($request->status == 'approve')
        {
            $overtime->status = 1;
            $overtime->save();
            return redirect('list-task');
        }else
        {
            $overtime->status = 0;
            $overtime->save();
            return redirect('list-task');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        //
        Overtime::destroy($id);
        $request->session()->flash('status','Delete successful');
        return redirect('list-task');
    }
}
