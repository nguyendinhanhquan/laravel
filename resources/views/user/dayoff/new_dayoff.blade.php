@extends('user.layout')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user_home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title">Create New Dayoff</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->



                    <form id="dayoff" role="form" action="user_create_dayoff" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="card-body">
                            <div class="form-group d-none">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="text" class="form-control" id="IDNV" value="{{ Session::get('id') }}" disabled>
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>From (day):</label>
                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate1"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input readonly type="text" class="form-control datetimepicker-input"
                                        data-target="#reservationdate1" name="startDate" required id="startDate"
                                        onblur="checkValueDate()" />
                                    <label class="error" id="checkValueDate" for="startDate"></label>
                                </div>
                            </div>




                            <!-- Date -->
                            <div class="form-group">
                                <label> To (day):</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate2"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input readonly type="text" class="form-control datetimepicker-input"
                                        data-target="#reservationdate2" name="endDate" required id="endDate" disabled />
                                </div>
                            </div>
                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif



                            <div class="form-group">
                                <label for="reason">Reason</label>
                                <textarea class="form-control" name="reason" id="reason" cols="100" rows="3"
                                    required></textarea>
                            </div>



                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary bg-color" value="Update">Send</button>
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
    
        var now = Date.now();

        var CurrentDate = new Date();
        var max1Month = CurrentDate.setMonth(CurrentDate.getMonth() + 1);

        $(function() {
            $('#reservationdate1').datetimepicker({
                format: "DD-MM-YYYY",
                minDate: now,
                ignoreReadonly: true,
            })

            $('#reservationdate2').datetimepicker({
                format: "DD-MM-YYYY",
                minDate: now,
                maxDate: max1Month,
                ignoreReadonly: true,
            })

            //Date range picker
            $('#reservation').daterangepicker()
        });

    </script>



@endsection
