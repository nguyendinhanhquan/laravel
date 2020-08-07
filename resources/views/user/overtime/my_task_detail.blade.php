@extends('user.layout')


@section('content-header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My task detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My task detail</li>
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
                        <h3 class="card-title ">My task detail</h3>
                    </div>
                    <!-- /.card-header -->
                    @foreach ($data as $item)

                        <div class="card-body ">
                            <strong><i class="fas fa-check-circle"></i> Status</strong>

                            @if ($item->status === 1)
                                <p class="text-success"> Approve</p>
                            @elseif ($item->status === 0 )
                                <p class="text-danger">Reject</p>
                            @else
                                <p class="text-info">Wating ...</p>
                            @endif

                            <hr>

                            <strong><i class="fas fa-comment-dots"></i> Feedback</strong>

                            <p class="text-muted">
                                {{ $item->feedback }}
                            </p>

                            <hr>

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
