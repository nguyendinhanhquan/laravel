<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dayoff;
use App\Overtime;


class DayoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function month()
    {

        $id = session('id');
        $data = Dayoff::selectRaw('
        YEAR(start_date) as year , 
        MONTH(start_date)  as month, 
        SUM(number_day_off) AS totalDay')
        ->where('user_id',$id)
        ->where('status',1)
        ->groupBy('year', 'month')
        ->get();
        return view('user.dayoff.show_dayoff_to_month',['data'=>$data]);
    }



    public function year()
    {

        $id = session('id');
        $data = Dayoff::selectRaw('
        YEAR(start_date) as year , 
        SUM(number_day_off) AS totalDay')
        ->where('user_id',$id)
        ->where('status',1)
        ->groupBy('year',)
        ->get();

        return view('user.dayoff.show_dayoff_to_year',['data'=>$data]);
    }


    public function index()
    {
        //
        $id = session('id');
        $data = Dayoff::where('user_id',$id)->orderBy('id', 'desc')->get();
        return view('user.dayoff.show_dayoff',['data'=>$data]);
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

        

        $dayoff = new Dayoff;
        $startDate = $request->startDate;
        $endDate =  $request->endDate;
        
        $startDate = date_format(date_create($startDate),'Y-m-d');
        $endDate = date_format(date_create($endDate),'Y-m-d');
        // dd($startDate < $endDate);

        if($startDate <= $endDate){
            //Tính số ngày nghỉ
            $start_time = \Carbon\Carbon::parse($startDate);
            $finish_time = \Carbon\Carbon::parse($endDate);
            $number_dayoff = $start_time->diffInDays($finish_time, false) + 1;

        
            $dayoff->user_id = session('id');
            $dayoff->start_date = $startDate;
            $dayoff->end_date = $endDate;
            $dayoff->reason_day_off = $request->reason;
            $dayoff->number_day_off = $number_dayoff;

            $dayoff->save();
            return redirect('user_show_dayoff');
        }else
        {
            $request->session()->flash('status','Selecting invalid date !');
            return view('user.dayoff.new_dayoff');
        };
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
    public function destroy(Request $request ,$id)
    {
        //
        $record = Dayoff::destroy($id);
        if($record){
            $request->session()->flash('status','Delete successful');
            return redirect('user_show_dayoff');
        }else
        {
            $request->session()->flash('status','Delete fail');
            return redirect('user_show_dayoff');
        }
    }
}
