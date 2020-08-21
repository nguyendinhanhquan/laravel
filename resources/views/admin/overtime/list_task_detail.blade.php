@extends('admin.layout')


@section('content-header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List task detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('list-task') }}">List task</a></li>
                        <li class="breadcrumb-item active">List task detail</li>
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
                        <h3 class="card-title ">List task detail</h3>
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
                            @endif



                        </div>


                    @endforeach


                    @if ($item->total_time != 0)
                        <div class="card-header bg-color w-100">
                            <h3 class="card-title ">Admin confirm</h3>
                        </div>
                        <div class="card-body">

                            <form action="confirm" method="post" id="admin_overtime_form">
                                @csrf


                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value="{{ $item->id }}">
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        @if ($item->total_time == 0)
                                            <input type="radio" {{ $item->status == '1' ? 'checked' : '' }} name="status"
                                                value="approve" id="radioSuccess1" disabled>
                                        @else
                                            <input type="radio" {{ $item->status == '1' ? 'checked' : '' }} name="status"
                                                value="approve" id="radioSuccess1">
                                        @endif

                                        <label for="radioSuccess1">
                                            Approve
                                        </label>
                                    </div>
                                </div>



                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">


                                        @if ($item->total_time == 0)
                                            <input type="radio" {{ $item->status == '0' ? 'checked' : '' }} name="status"
                                                value="reject" id="radioDanger1" disabled>
                                        @else
                                            <input type="radio" {{ $item->status == '0' ? 'checked' : '' }} name="status"
                                                value="reject" id="radioDanger1">
                                        @endif
                                        <label for="radioDanger1">
                                            Reject
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">Feedback</label>
                                    @if ($item->total_time == 0)
                                        <textarea class="form-control" name="feedback" id="feedback" cols="100" rows="3"
                                            disabled>{{ $item->feedback }}</textarea>
                                    @else
                                        <textarea class="form-control" name="feedback" id="feedback" cols="100"
                                            rows="3">{{ $item->feedback }}</textarea>
                                    @endif
                                </div>


                                <div class=" text-center">
                                    @if ($item->total_time == 0)
                                        <button disabled type="submit"
                                            class="btn btn-primary bg-color w-50 ">Submit</button>
                                    @else
                                        <button type="submit" class="btn btn-primary bg-color w-50 ">Submit</button>
                                    @endif
                                </div>

                            </form>
                        </div>
                    @endif
                </div>

                <!-- /.card-body -->
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
