@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Dayoff Requests </span>
                    <span class="info-box-number">{{ $dayoff }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success cc_cursor"><i class="far fa-clock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Overtime Requests</span>
                    
                    <span class="info-box-number">{{ $overtime }}</span>
                    

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">{{ $users }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-globe-americas"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Today</span>
                    <span class="info-box-number">{{ $time }}</span>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    @if (Session::get('status'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif

@endsection
