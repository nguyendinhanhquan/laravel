<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PdfController extends Controller
{
    //
    public function pdfview($id)
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
        // view()->share('data', $data);
        view()->share(['data'=>$data,'carbon'=>$carbon,'month'=>$month_id]);

        // if ($request->has('download')) {
        // pass view file
        $pdf = PDF::loadView('admin.salary.pdfview');
        // download pdf
        return $pdf->download('salary.pdf');
        // }
        // return view('admin.salary.pdfview');
    }

}
