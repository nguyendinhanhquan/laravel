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



                    <form role="form" action="user_create_dayoff" method="post" enctype="multipart/form-data">

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
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#reservationdate1" name="startDate" required />
                                    <div class="input-group-append" data-target="#reservationdate1"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            {{-- <!-- /.form group -->
                            <!-- Date range -->
                            <div class="form-group">
                                <label>Date range:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group --> --}}


                            <!-- Date -->
                            <div class="form-group">
                                <label> To (day):</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#reservationdate2" name="endDate" required />
                                    <div class="input-group-append" data-target="#reservationdate2"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            @if (Session::get('status'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif



                            <div class="form-group">
                                <label for="note">Reason</label>
                                <textarea class="form-control" name="reason" id="" cols="100" rows="5" required></textarea>
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
        $(function() {

            $('#reservationdate1').datetimepicker({
                format: "DD-MM-YYYY",
            })

            $('#reservationdate2').datetimepicker({
                format: "DD-MM-YYYY",
            })

            //Date range picker
            $('#reservation').daterangepicker()
        });

    </script>



@endsection
