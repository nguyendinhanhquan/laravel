<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Overtime;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        $data = DB::table('users_tbl')
            ->join('overtime_tbl', 'users_tbl.id', '=', 'overtime_tbl.user_id')
            ->select(DB::raw('
            fullname,
            YEAR(date_ot) as year ,
            MONTH(date_ot) as month ,
            SUM(total_time) AS total'))
            ->where('status', 1)
            ->groupBy('year', 'month', 'fullname')
            ->get();

        return view('admin.overtime.total_time', ['data' => $data]);
    }

    public function newtask()
    {
        //
        // $user = Users::all();
        $user = Users::where('id', '!=', 1 )->get();
        return view('admin.overtime.new_task', ['user' => $user]);
    }

    public function index()
    {
        //

        $data = DB::table('users_tbl')
            ->join('overtime_tbl', 'users_tbl.id', '=', 'overtime_tbl.user_id')
            ->select('users_tbl.fullname', 'overtime_tbl.*')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.overtime.list_task', ['data' => $data]);
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
        foreach ($request->input('user') as $user) {
            $overtime = new Overtime;

            $overtime->date_ot = null;
            $overtime->start_time = null;
            $overtime->end_time = null;
            $overtime->total_time = 0;
            $overtime->user_id = $user;
            $overtime->place_ot = $request->place_ot;
            $overtime->task_name = $request->task_name;
            $overtime->save();
        }
        return redirect('list-task');

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
        $data = Overtime::where('id', $id)->get();
        return view('admin.overtime.list_task_detail', ['data' => $data]);
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

        if ($request->status == null) {
            return redirect('list-task');
        }

        if ($request->status == 'approve') {
            $overtime->status = 1;
            $overtime->save();
            return redirect('list-task');
        } else {
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
    public function destroy(Request $request, $id)
    {
        //
        if(Overtime::find($id)->status == null)
        {
            Overtime::destroy($id);
            $request->session()->flash('status', 'Delete successful');
            return redirect('list-task');
        }else
        {
            $request->session()->flash('error-delete', "You cann't delete this record");
            return redirect('list-task');
        }
        
    }
}
