<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ExcelControler extends Controller
{
    //
    public function export(Request $request) 
    {
        return Excel::download(new UsersExport($request->id), 'Salary.xlsx');
    }

}
