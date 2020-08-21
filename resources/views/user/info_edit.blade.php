@extends('user.layout')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user_home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('user_info') }}">Profile</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title ">Update my info</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form_user_update" role="form" action="user_update" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" placeholder="" value="{{ $data->id }}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fullname</label>
                                <input type="text" class="form-control" id="fullname" value="{{ $data->fullname }}"
                                    name="fullname">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="email" value="{{ $data->email }}" name="email">
                            </div>

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}">
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Birthday:</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#datetimepicker1"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input readonly type="text" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker1" id="birthday" name="birthday" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Adress</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $data->address }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Identity Card</label>
                                <input type="text" class="form-control" id="IDCard" name="IDCard"
                                    value="{{ $data->identity_card }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Issue Place</label>
                                <input type="text" class="form-control" id="IPlace" name="IPlace"
                                    value="{{ $data->issue_place }}">
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Issue Date:</label>
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#datetimepicker2"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input readonly type="text" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker2" name="IDate" id="IDate" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">University</label>
                                <input type="text" class="form-control" id="university" name="university"
                                    value="{{ $data->university }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Year Of Gradute</label>
                                <input type="text" class="form-control" id="YOG" name="YOG"
                                    value="{{ $data->year_of_graduate }}">
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Start Job:</label>
                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#datetimepicker3"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input readonly type="text" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker3" name="StartJob" id="StartJob" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">

                                        <input onchange="fileInfo()" type="file" class="custom-file-input" id="avatar" name="avatar"
                                            value="{{ $data->avatar }}">
                                        <label class="custom-file-label" for="exampleInputFile" >Choose file</label>
                                    </div>

                                </div>
                                <label id="avatar-error" class="error" for="exampleInputFile" style="display: none"></label>

                            </div>

                           


                            

                            @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <textarea class="form-control" name="note" id="note" cols="100"
                                    rows="2">{{ $data->note }}</textarea>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary bg-color" id="update_id">Update</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->

    </div>
    <!-- /.row -->
    </div>





@endsection



@section('script')
    <script>
        $(function() {
            
            $('#datetimepicker1').datetimepicker({
                format: "DD-MM-YYYY",
                defaultDate: '{{ $data->birthday }}',
                ignoreReadonly: true,
            })

            $('#datetimepicker2').datetimepicker({
                format: "DD-MM-YYYY",
                defaultDate: '{{ $data->issue_date }}',
                ignoreReadonly: true,
            })

            $('#datetimepicker3').datetimepicker({
                format: "DD-MM-YYYY",
                defaultDate: '{{ $data->start_job_at_company }}',
                ignoreReadonly: true,
            })





        });

    </script>
@endsection
