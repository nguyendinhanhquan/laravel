@extends('admin.layout')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Salary Basic</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Salary Basic</li>
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
                        <h3 class="card-title ">Update Salary Basic</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="salary_basic" role="form" action="salary-basic" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            
                            
                            <div class="form-group">
                                <label>Fullname</label>
                                <select class="form-control" name="user_id">
                                    @foreach ($data as $item )
                                        <option  value="{{ $item->id }}">ID: {{ $item->id }} - {{ $item->fullname }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Salary basic (VND)</label> 
                                <input type="text"  data-type="currency" class="form-control" id="salary_basic" name="basic_salary">
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary bg-color" >Update</button>
                            </div>
                    </form>


                    <table id="example1" class="table table-bordered table-striped mt-2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Salary Basic </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data2 as $item) 
                                    <tr>
                                        <td>{{$item->user_id}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{ number_format($item->basic_salary, 0, ',', '.') }} VND</td>
                                    </tr>
                            @endforeach
                        </tbody>

                    </table>
                    
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
            })

        });

    </script>
@endsection
