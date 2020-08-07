@extends('admin.layout')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('user') }}">Staff</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('user/' .$data[0]->id) }}">Staff info</a></li>
                        <li class="breadcrumb-item active">Staff info edit</li>
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
                    <form role="form" action="update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" placeholder="" value="{{ $data[0]->id }}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fullname</label>
                                <input type="text" class="form-control" id="exampleInputEmail3"
                                    value="{{ $data[0]->fullname }}" name="fullname">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    value="{{ $data[0]->email }}" name="email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="number" class="form-control" id="exampleInputEmail3" name="phone"
                                    value="{{ $data[0]->phone }}">
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Birthday:</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker1" name="birthday" />
                                    <div class="input-group-append" data-target="#datetimepicker1"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Adress</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="address"
                                    value="{{ $data[0]->address }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Identity Card</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="IDCard"
                                    value="{{ $data[0]->identity_card }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Issue Place</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="IPlace"
                                    value="{{ $data[0]->issue_place }}">
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Issue Date:</label>
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker2" name="IDate" />
                                    <div class="input-group-append" data-target="#datetimepicker2"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">University</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="university"
                                    value="{{ $data[0]->university }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Year Of Gradute</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="YOG"
                                    value="{{ $data[0]->year_of_graduate }}">
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Start Job:</label>
                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker3" name="StartJob" />
                                    <div class="input-group-append" data-target="#datetimepicker3"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="avatar"
                                            value="{{ $data[0]->avatar }}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <textarea class="form-control" name="note" id="" cols="100"
                                    rows="5">{{ $data[0]->note }}</textarea>
                            </div>


                            <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary bg-color" value="Update">Update</button>
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
                defaultDate: '{{ $data[0]->birthday }}',
            })

            $('#datetimepicker2').datetimepicker({
                format: "DD-MM-YYYY",
                defaultDate: '{{ $data[0]->issue_date }}'
            })

            $('#datetimepicker3').datetimepicker({
                format: "DD-MM-YYYY",
                defaultDate: '{{ $data[0]->start_job_at_company }}',
            })

        });

    </script>
@endsection
