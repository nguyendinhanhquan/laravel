@extends('user.layout')
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dayoff</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('user_home') }}">Home</a></li>
          <li class="breadcrumb-item active">Dayoff</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

@endsection 
@section('content')

    <!-- DETAIL --->
    <div class="row">
        <div class="col-12">
          
  
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Day Off Detail</h3>
             
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                    
                <tr>
                  <th>Year</th>
                  <th>Total Dayoff</th>
                  <th>Leave (12day/year)</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)

                  <tr>
                    <td>{{$item->year}}</td>
                    <td>{{$item->totalDay}} day</td>
                    <td> 
                          {{12-$item->totalDay }} day
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


@endsection   



@section('script')

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