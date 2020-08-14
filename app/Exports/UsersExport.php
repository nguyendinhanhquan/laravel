<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;


class UsersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $month_id = $this->id;
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

        return view('admin.salary.excel_view', [
            'data' => $data,
            'carbon' => $carbon,
            'month' => $month_id,
            ]);
    }

}
