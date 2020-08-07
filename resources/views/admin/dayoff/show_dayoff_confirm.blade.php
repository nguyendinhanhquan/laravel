@extends('admin.layout')


@section('content-header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dayoff</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dayoff') }}">Dayoff</a></li>
                        <li class="breadcrumb-item active">Dayoff detail</li>
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
                    <div class="card-header bg-color">
                        <h3 class="card-title ">Detail Dayoff </h3>
                    </div>
                    <!-- /.card-header -->
                    @foreach ($items as $item)

                        <div class="card-body">
                            <strong><i class="fas fa-user-circle"></i> Fullname</strong>

                            <p class="text-muted">
                                {{ $item->fullname }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-calendar-alt"></i> From</strong>

                            <p class="text-muted">
                                {{ date_format(date_create($item->start_date), 'd-m-Y') }}

                            </p>

                            <hr>

                            <strong><i class="fas fa-calendar-alt"></i> To </strong>

                            <p class="text-muted">
                                {{ date_format(date_create($item->end_date), 'd-m-Y') }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-atom"></i> Total </strong>

                            <p class="text-muted">
                                {{ $item->number_day_off }} day
                            </p>

                            <hr>

                            <strong><i class="fas fa-file"></i> Reason</strong>

                            <p class="text-muted">
                                {{ $item->reason_day_off }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-check-double"></i> Action</strong>

                            {{-- <div class="option d-flex my-2 justify-content-around">
                                <a href="{{ $item->id }}/yes" class="btn btn-primary bg-success border-0  w-25">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="{{ $item->id }}/no" class="btn btn-primary bg-danger border-0  w-25">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <hr> --}}

                            <form action="confirm" method="post">
                                @csrf


                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value="{{ $item->id }}">
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" {{ $item->status == '1' ? 'checked' : '' }} name="status"
                                            value="approve" id="radioSuccess1">
                                        <label for="radioSuccess1">
                                            Approve
                                        </label>
                                    </div>
                                </div>



                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" {{ $item->status == '0' ? 'checked' : '' }} name="status"
                                            value="reject" id="radioDanger1">
                                        <label for="radioDanger1">
                                            Reject
                                        </label>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="note">Feedback</label>
                                    <textarea class="form-control" name="feedback" cols="100"
                                        rows="3"></textarea>
                                </div> --}}


                                <div class=" text-center">
                                    <button type="submit" class="btn btn-primary bg-color w-50 ">Submit</button>
                                </div>

                            </form>

                    @endforeach

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
    </div>


@endsection






@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection
