<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
        $id = session('id');
        $data = DB::table('overtime_tbl')
        ->select( DB::raw('
        YEAR(date_ot) as year , 
        MONTH(date_ot) as month , 
        SUM(total_time) AS total'))
        ->where('user_id',$id)
        ->where('status',1)
        ->groupBy('year','month')
        ->get();
        return view('user.overtime.total_time',['data'=>$data]);
    }
    public function index()
    {
        //
        $id = session('id');
        $data = Overtime::where('user_id',$id)->get();
        return view('user.overtime.my_task',['data'=>$data]);
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
        $overtime = new Overtime;
        $overtime->user_id = $request->user_id;
        $overtime->place_ot = $request->place_ot;
        $overtime->task_name = $request->task_name;
        $overtime->note = $request->note;

        $date_ote = $request->date_ot;
        $start_time = $request->start_time;
        $end_time = $request->end_time;

        if($start_time < $end_time)
        {
            $start = Carbon::parse($start_time);
            $end = Carbon::parse($end_time);
            $total_time = $end->diffInMinutes($start);

            $date_ote = date_format(date_create($date_ote),'Y-m-d');
            $start_time = date_format(date_create($start_time),'Y-m-d H-i-s');
            $end_time = date_format(date_create($end_time),'Y-m-d H-i-s');

            $overtime->date_ot = $date_ote;
            $overtime->start_time = $start_time;
            $overtime->end_time = $end_time;
            $overtime->total_time = $total_time;
            

            $overtime->save();  
            return redirect('my-task');
        }
        else
        {
            $request->session()->flash('status','Selecting Time Invalid !!!');
            return redirect('new-task');
        }

        
        $start = Carbon::parse($start_time);
        $end = Carbon::parse($end_time);
        $total_time  = $end->diffInMinutes($start);

        $date_ote = date_format(date_create($date_ote),'Y-m-d');
        $start_time = date_format(date_create($start_time),'Y-m-d H-i-s');
        $end_time = date_format(date_create($end_time),'Y-m-d H-i-s');

        $overtime->date_ot = $date_ote;
        $overtime->start_time = $start_time;
        $overtime->end_time = $end_time;
        $overtime->total_time = $total_time;
        

        $overtime->save();  
        return redirect('my-task');

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
        return view('user.overtime.my_task_detail',['data'=>$data]);
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
    public function destroy(Request $request, $id)
    {
        //
        Overtime::destroy($id);
        $request->session()->flash('status','Delete successful');
        return redirect('my-task');
    }
}
