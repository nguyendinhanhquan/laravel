@extends('admin.layout')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('user') }}">Staff</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('user/' . $data[0]->id) }}">Staff info</a></li>
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
                    <!-- form start    action="update" -->
                    <form id="form_info_edit" role="form" action="update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" placeholder="" value="{{ $data[0]->id }}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullname ">Fullname</label>
                                <input type="text" class="form-control" id="fullname" value="{{ $data[0]->fullname }}"
                                    name="fullname">
                            </div>

                            <div class="form-group">
                                <label for="email_id">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ $data[0]->email }}"
                                    name="email">
                            </div>

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <div class="form-group">
                                <label for="number_id">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $data[0]->phone }}">
                            </div>

                            <!-- Date -->
                            <div class="form-group">
                                <label>Birthday:</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#datetimepicker1"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input readonly type="text" class="form-control datetimepicker-input "
                                        data-target="#datetimepicker1" name="birthday" id="birthday" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address_id">Adress</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $data[0]->address }}">
                            </div>

                            <div class="form-group">
                                <label for="idcard_id">Identity Card</label>
                                <input  type="text" class="form-control" id="IDCard" name="IDCard"
                                    value="{{ $data[0]->identity_card }}">
                            </div>

                            <div class="form-group">
                                <label for="IPlace_id">Issue Place</label>
                                <input type="text" class="form-control" id="IPlace" name="IPlace"
                                    value="{{ $data[0]->issue_place }}">
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
                                <label for="University_id">University</label>
                                <input type="text" class="form-control" id="university" name="university"
                                    value="{{ $data[0]->university }}">
                            </div>

                            <div class="form-group">
                                <label for="YOG_id">Year Of Gradute</label>
                                <input type="text" class="form-control" id="YOG" name="YOG"
                                    value="{{ $data[0]->year_of_graduate }}">
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
                                        <input type="file" class="custom-file-input" id="avatar" name="avatar"
                                            value="{{ $data[0]->avatar }}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                   
                                </div>
                                <label id="avatar-error" class="error" for="exampleInputFile" style="display: none"></label>
                            </div>

                            @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                          


                            <div class="form-group">
                                <label for="note_id">Note</label>
                                <textarea class="form-control" name="note" id="note" cols="100"
                                    rows="2">{{ $data[0]->note }}</textarea>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button id="update_id" type="submit" class="btn btn-primary bg-color">Update</button>
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
                ignoreReadonly: true,
            })

            $('#datetimepicker2').datetimepicker({
                format: "DD-MM-YYYY",
                defaultDate: '{{ $data[0]->issue_date }}',
                ignoreReadonly: true,
            })

            $('#datetimepicker3').datetimepicker({
                format: "DD-MM-YYYY",
                defaultDate: '{{ $data[0]->start_job_at_company }}',
                ignoreReadonly: true,
            })

        });

    </script>
@endsection
