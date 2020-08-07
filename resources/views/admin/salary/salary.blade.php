@extends('admin.layout')


@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> Staff List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"> Staff List</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

@endsection  

@section('content')


<div class="container-fluid">

    <!-- DETAIL --->
    <div class="row">
      <div class="col-12">
        

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-table"></i> Staff List</h3>
           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Salary Basic</th>
                <th>Month</th>
                <th>Total Time OT </th>
                <th>Salary OT</th>
                <th>Total</th>
                <th>Status</th>
                <th>Option</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>10.000.000đ</td>
                    <td>{{$item->phone}}</td>
                    
                    {{-- <td class="text-center">
                      @if ($item->status === 1)
                          <p class="text-success"> <i class="fas fa-check"></i></p>
                      @else
                          <p class="text-danger"><i class="fas fa-times"></i></p>
                      @endif

                    </td> --}}
               
                    <td class="option">
                      
                      <a href="user/{{$item->id}}" class="btn btn-primary bg-color">
                        <i class="fas fa-info-circle"></i>
                      </a>
                      {{-- <a href="#" class="btn btn-primary bg-color" onclick="deleteJS()">
                        <i class="fas fa-trash"></i>
                      </a> --}}

                    </td>
                </tr>
                    @endforeach
              </tbody>
              
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

   
    
  </div>
@endsection   


@section('script')

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
<script>  
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "searching": false,

    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  
</script>

<script type="text/javascript">
    $(function () {
      
      $('#reservationdate1').datetimepicker({
          format: "DD-MM-YYYY",
      })
  
      $('#reservationdate2').datetimepicker({
          format: "DD-MM-YYYY",
      })
  


    });



  </script>

@endsection