<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Salary;
use App\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salaryBasic()
    {
        $data = Users::all();
        $data2 = DB::table('users_tbl')
            ->leftJoin('salary_tbl', 'users_tbl.id', '=', 'salary_tbl.user_id')
            ->select('users_tbl.id', 'users_tbl.fullname', 'salary_tbl.*', )
            ->orderBy('user_id', 'desc')
            ->get();

        return view('admin.salary.salary_basic', ['data2' => $data2, 'data' => $data]);
    }

    // public function january()
    // {
    //     $data = DB::table('users_tbl')
    //         ->leftJoin('dayoff_tbl', 'users_tbl.id', '=', 'dayoff_tbl.user_id')
    //         ->select(DB::raw('
    //         users_tbl.id,
    //         fullname,
    //         MONTH(start_date) as month,
    //         YEAR(start_date) as year ,
    //         SUM(number_day_off) AS totalDay'
    //         ))
    //         ->whereMonth('start_date', '1')
    //         ->groupBy('year', 'month', 'fullname', 'id')

    //         ->get();

    //     dd($data);
    //     //->whereYear('start_date', '2020')
    //     return view('admin.salary.salary', ['data' => $data]);

    // }

    public function index($id)
    {
        $month_id = $id;
        $data = DB::table('users_tbl')
            ->leftJoin('salary_tbl', 'users_tbl.id', '=', 'salary_tbl.user_id')
            ->leftJoin('overtime_tbl', 'users_tbl.id', '=', 'overtime_tbl.user_id')
            ->select(
                'users_tbl.id',
                'users_tbl.fullname',
                'salary_tbl.basic_salary',
                'overtime_tbl.month',
            )
            ->selectRaw("COALESCE(SUM(case when month = $month_id and status = 1 then total_time end), 0) as total_time")
            ->groupBy('users_tbl.id')
            ->get('fullname');

            $carbon = Carbon::createFromFormat('m', $month_id)->endOfMonth()->modify('0 month')->toDateTimeString();
            
        return view('admin.salary.salary', [
            'data' => $data,
            'carbon' => $carbon,
            'month' => $month_id,

            ]);
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

        Salary::updateOrCreate(
            [
                'user_id' => $request->get('user_id'),
            ],
            [
                'basic_salary' => $request->get('basic_salary'),
            ]
        );
        return redirect('salary-basic');

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
