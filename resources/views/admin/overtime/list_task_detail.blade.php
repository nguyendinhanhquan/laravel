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
                            {{-- <strong><i class="fas fa-check-circle"></i> Status</strong>

                            @if ($item->status === 1)
                                <p class="text-success"> <i class="fas fa-check"></i></p>
                            @elseif ($item->status === 0 )
                                <p class="text-danger"><i class="fas fa-times"></i></p>
                            @else
                                <p class="text-info">Wating ...</p>
                            @endif


                            

                            <hr> --}}

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

                            <strong><i class="fas fa-clipboard"></i> Note</strong>

                            <p class="text-muted">
                                {{ $item->note }}
                            </p>

                            <hr>
                            <form action="confirm" method="post">
                            @csrf


                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="{{ $item->id }}">
                            </div>
                            <div class="form-group clearfix">
                                <div class="icheck-success d-inline">
                                    <input type="radio" {{ ($item->status=="1")? "checked" : "" }} name="status" value="approve" id="radioSuccess1">
                                    <label for="radioSuccess1">
                                        Approve
                                    </label>
                                </div>
                            </div>

                            

                            <div class="form-group clearfix">
                                <div class="icheck-danger d-inline">
                                    <input type="radio" {{ ($item->status=="0")? "checked" : "" }} name="status" value="reject"  id="radioDanger1">
                                    <label for="radioDanger1">
                                        Reject
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note">Feedback</label>
                                <textarea class="form-control" name="feedback"  cols="100" rows="3">{{ $item->feedback }}</textarea>
                            </div>


                            <div class=" text-center">
                                <button type="submit" class="btn btn-primary bg-color w-50 ">Submit</button>
                            </div>

                            </form>

                            {{-- <strong><i class="fas fa-check-double"></i> Action</strong>

                            <div class="option d-flex my-2 justify-content-around">
                                <a href="{{ $item->id }}/yes" class="btn btn-primary bg-success border-0  w-25">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="{{ $item->id }}/no" class="btn btn-primary bg-danger border-0  w-25">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <hr> --}}
                        </div>


                    @endforeach

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
