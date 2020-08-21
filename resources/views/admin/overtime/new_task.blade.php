@extends('admin.layout')
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



                    <form id="overtime" role="form" action="new-task-admin" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control"  name="user_id" value="{{ Session::get('id') }}">
                            </div>

                           


                            <div class="form-group">
                                <label>Select Multiple Staff</label>    
                                <select multiple="" class="form-control" id="user" name="user[]" required>
                                    @foreach ($user as $item)
                                        <option data-toggle="tooltip" data-placement="top" title="Press & hold ctrl to select multiple" value="{{ $item->id }}">ID: {{ $item->id }} - {{ $item->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Place OT</label>
                                <input type="text" class="form-control" name="place_ot" value="" id="place_ot" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Task name</label>
                                <input type="text" class="form-control" name="task_name" value="" id="task_name" required>
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
