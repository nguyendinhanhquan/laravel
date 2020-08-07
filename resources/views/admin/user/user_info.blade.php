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
          
          <li class="breadcrumb-item active">Staff info</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

@endsection 
@section('content')

<div class="container-fluid">
<div class="row">
   @foreach ($item as $item)
       
    <div class="col-md-12 d-flex">
    

      <!-- Profile Image -->
      <div class="card card-primary card-outline col-md-3">
        <div class="card-body box-profile">
          <div class="text-center wh-300 mx-auto">
            <img class="profile-user-img img-fluid img-circle"
                src="{{$item->avatar}}"
                alt="User profile picture">
          </div>


          <p class="text-muted text-center"></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Fullname: </b> <a class="float-right">{{$item->fullname}}</a>
            </li>

            <li class="list-group-item">
              <b>Birdthday: </b> <a class="float-right">{{date_format(date_create($item->birthday), 'd-m-Y')}}</a>
            </li>
           
            <li class="list-group-item">
              <b>Phone: </b> <a class="float-right">{{$item->phone}}</a>
            </li>

            <li class="list-group-item">
              <b>Status: </b> 
              <a class="float-right">
                @if ($item->status === 1)
                  <b class="float-right text-success">active</b>
                @else
                  <b class="float-right text-danger">disable</b>
                @endif
              </a>
            </li>

            
          </ul>

          <a href="/edit/{{$item->id}}" class="btn btn-primary btn-block bg-color"><b>Edit</b></a>
          @if ($item->id != 1)
              <a href="/user/active/{{$item->id}}" class="btn btn-success btn-block "><b>Active</b></a>
              <a href="/user/disable/{{$item->id}}" class="btn btn-danger btn-block "><b>Disable</b></a>
          @endif
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary col-md-9 mx-2">
        <div class="card-header bg-color">
          <h3 class="card-title ">About Me</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fas fa-book mr-1"></i> University</strong>

          <p class="text-muted">
            {{$item->university}}
          </p>

          <hr>

          <strong><i class="fas fa-graduation-cap mr-1"></i> Year Of Gradute</strong>

          <p class="text-muted">
            {{$item->year_of_graduate}}
          </p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Adress </strong>

          <p class="text-muted">
            {{$item->address}}
          </p>

          <hr>

          <strong><i class="fas fa-envelope mr-1"></i> Email </strong>

          <p class="text-muted">
            {{$item->email}}
          </p>

          <hr>

          <strong><i class="fas fa-id-card mr-1"></i> Identity Card</strong>

          <p class="text-muted">
            {{$item->identity_card}}
          </p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Issue Place</strong>

          <p class="text-muted">
            {{$item->issue_place}}
            
          </p>

          <hr>

          <strong><i class="fas fa-calendar-alt mr-1"></i></i> Issue Date</strong>

          <p class="text-muted">
            {{date_format(date_create($item->issue_date), 'd-m-Y')}}

          </p>

          <hr>

          <strong><i class="fas fa-award mr-1"></i> Start Job </strong>

          <p class="text-muted">
            {{date_format(date_create($item->start_job_at_company), 'd-m-Y')}}
          </p>

          <hr>

          

          <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

          <p class="text-muted">{{$item->note}}</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
   @endforeach
    
</div>
</div>
@endsection   