@extends('user.layout')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">New task</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user_home') }}">Home</a></li>
                        <li class="breadcrumb-item active">New task</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->


            <div class="col-md-12">
                <!-- general form elements -->

                <div class="card card-primary">

                    <div class="card-header bg-color">
                        <h3 class="card-title">Create New Task</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->



                    <form id="overtime" role="form" action="new_task" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="user_id" value="{{ Session::get('id') }}">
                            </div>


                            <!-- Date -->
                            <div class="form-group">
                                <label>Day Overtime:</label>
                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate1"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input type="text" onblur="checkDateOT()" class="form-control datetimepicker-input"
                                        data-target="#reservationdate1" name="date_ot" required id="day_overtime" />
                                    <label class="error" id="checkValueDate" for="date_ot"></label>
                                </div>
                            </div>

                            <!-- time Picker -->
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Start Time:</label>

                                    <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#timepicker1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        <input onblur="checkStartTime()" type="text"
                                            class="form-control datetimepicker-input" data-target="#timepicker1"
                                            name="start_time" required id="start_time" />

                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>

                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <!-- time Picker -->
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>End Time:</label>

                                    <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#timepicker2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        <input onblur="checkEndTime()" type="text" class="form-control datetimepicker-input"
                                            data-target="#timepicker2" name="end_time" required id="end_time" disabled />
                                        <label class="error" id="endTime_error" for="end_time"></label>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>

                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="exampleInputEmail1">Place OT</label>
                                <input type="text" class="form-control" name="place_ot" value="" id="place_ot" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Task name</label>
                                <input type="text" class="form-control" name="task_name" value="" id="task_name" required>
                            </div>


                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" name="note" id="note" cols="100" rows="3"></textarea>
                            </div>



                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary bg-color">Create</button>
                        </div>

                    </form>
                </div>


            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->

    </div>




    </div>

    </div>



@endsection

@section('script')
    <script type="text/javascript">
        $(function() {

            $('#reservationdate1').datetimepicker({
                format: "DD-MM-YYYY",
            })

            $('#reservationdate2').datetimepicker({
                format: "DD-MM-YYYY",
            })

            //Timepicker
            $('#timepicker1').datetimepicker({
                format: 'HH:mm'
            })

            //Timepicker
            $('#timepicker2').datetimepicker({
                format: 'HH:mm'
            })
        });

    </script>



@endsection
