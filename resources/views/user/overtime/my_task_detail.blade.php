@extends('user.layout')


@section('content-header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user_home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('my-task') }}">My task</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex">
                <!-- About Me Box -->
                <div class="card card-primary col-md-12 mx-2">
                    <div class="card-header bg-color ">
                        <h3 class="card-title ">Detail</h3>
                    </div>
                    <!-- /.card-header -->
                    @foreach ($data as $item)

                        <div class="card-body ">
                            @if ($item->status != null && $item->status != 3)
                                <strong><i class="fas fa-check-circle"></i> Status</strong>

                                @if ($item->status === 1)
                                    <b>
                                        <p class="text-success"> Approve</p>
                                    </b>
                                @elseif ($item->status === 0 )
                                    <b>
                                        <p class="text-danger">Reject</p>
                                    </b>
                                @endif
                                <hr>

                                <strong><i class="fas fa-comment-dots"></i> Feedback from Admin <b
                                        class="text-danger">*</b></strong>

                                <p class="text-muted">
                                    {{ $item->feedback }}
                                </p>

                                <hr>

                            @endif

                            <div>




                                <strong><i class="fas fa-map-marker-alt"></i> Place OT</strong>

                                <p class="text-muted">
                                    {{ $item->place_ot }}
                                </p>

                                <hr>

                                <strong><i class="fas fa-tasks"></i> Task Name</strong>

                                <p class="text-muted">
                                    {{ $item->task_name }}
                                </p>

                                <hr>

                                @if ($item->total_time != 0)

                                    <strong><i class="fas fa-calendar-alt"></i> Date OT</strong>

                                    <p class="text-muted">
                                        {{ date_format(date_create($item->data_ot), 'd-m-Y') }}

                                    </p>

                                    <hr>


                                    <strong><i class="fas fa-clock"></i> Start Time </strong>

                                    <p class="text-muted">
                                        {{ date_format(date_create($item->start_time), 'H:i') }}
                                    </p>



                                    <hr>

                                    <strong><i class="fas fa-clock"></i> End Time </strong>


                                    <p class="text-muted">
                                        {{ date_format(date_create($item->end_time), 'H:i') }}
                                    </p>


                                    <hr>

                                    <strong><i class="fas fa-stopwatch"></i> Total Time</strong>

                                    <p class="text-muted">
                                        {{ $item->total_time }} Minutes
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-clipboard"></i> Note</strong>

                                    <p class="text-muted">
                                        {{ $item->note }}
                                    </p>

                                    <hr>
                            </div>
                    @endif

                </div>







                @if ( $item->status == 3)
                <div class="card-header bg-color">
                    <h3 class="card-title ">Staff confirm edit</h3>
                </div>
                <div class="card-body">

                    <form id="overtime" action="confirm_user/{{ $item->id }}" method="post" id="admin_overtime_form">
                        @csrf

                        <!-- Date -->
                        <div class="form-group">
                            <label>Day Overtime:</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate1"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input  readonly type="text" onblur="checkDateOT()" class="form-control datetimepicker-input"
                                    data-target="#reservationdate1" name="date_ot" required id="day_overtime" />
                                <label class="error" id="checkValueDate" for="date_ot"></label>
                            </div>
                        </div>

                        @if (Session::get('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif

                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">

                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Start Time:</label>

                                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                            <div class="input-group-append" data-target="#timepicker1"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                            <input readonly onblur="checkStartTime()" type="text"
                                                class="form-control datetimepicker-input" data-target="#timepicker1"
                                                name="start_time" required id="start_time" />

                                        </div>
                                    </div>
                                </div>


                            </div>

                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                        </div>



                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">


                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>End Time:</label>

                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                            <div class="input-group-append" data-target="#timepicker2"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                            <input readonly type="text"
                                                class="form-control datetimepicker-input" data-target="#timepicker2"
                                                name="end_time" required id="end_time" disabled />
                                            <label class="error" id="endTime_error" for="end_time"></label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="note">Note</label>

                            <textarea class="form-control" name="note" id="note" cols="100" rows="3"></textarea>
                        </div>


                        <div class=" text-center">
                            <button type="submit" class="btn btn-primary bg-color w-50 ">Submit</button>
                        </div>

                    </form>
                </div>
                @endif

            </div>

            @if ($item->status == null )
                <div class="card-header bg-color">
                    <h3 class="card-title ">Staff confirm </h3>
                </div>
                <div class="card-body">

                    <form id="overtime" action="confirm_user/{{ $item->id }}" method="post" id="admin_overtime_form">
                        @csrf

                        <!-- Date -->
                        <div class="form-group">
                            <label>Day Overtime:</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate1"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input readonly type="text"  class="form-control datetimepicker-input"
                                    data-target="#reservationdate1" name="date_ot" required id="day_overtime" />
                                <label class="error" id="checkValueDate" for="date_ot"></label>
                            </div>
                        </div>

                        @if (Session::get('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif

                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">

                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Start Time:</label>

                                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                            <div class="input-group-append" data-target="#timepicker1"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                            <input readonly onblur="checkStartTime()" type="text"
                                                class="form-control datetimepicker-input" data-target="#timepicker1"
                                                name="start_time" required id="start_time" />

                                        </div>
                                    </div>
                                </div>


                            </div>

                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                        </div>



                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">


                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>End Time:</label>

                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                            <div class="input-group-append" data-target="#timepicker2"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                            <input readonly type="text"
                                                class="form-control datetimepicker-input" data-target="#timepicker2"
                                                name="end_time" required id="end_time" disabled />
                                            <label class="error" id="endTime_error" for="end_time"></label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="note">Note</label>

                            <textarea class="form-control" name="note" id="note" cols="100" rows="3"></textarea>
                        </div>


                        <div class=" text-center">
                            <button type="submit" class="btn btn-primary bg-color w-50 ">Submit</button>
                        </div>

                    </form>
                </div>
                @endif
            

            @endforeach

        </div>
        <!-- /.card -->


    </div>
    </div>




@endsection






@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection


@section('script')
    <script type="text/javascript">
        var now = Date.now();
        $(function() {
            
            $('#reservationdate1').datetimepicker({
                format: "DD-MM-YYYY",
                minDate: now,
                ignoreReadonly: true,
            })

            $('#reservationdate2').datetimepicker({
                format: "DD-MM-YYYY",
                ignoreReadonly: true,
            })

            //Timepicker
            $('#timepicker1').datetimepicker({
                format: 'HH:mm',
                ignoreReadonly: true,
            })

            //Timepicker
            $('#timepicker2').datetimepicker({
                format: 'HH:mm',
                ignoreReadonly: true,
            })
        });

    </script>



@endsection
