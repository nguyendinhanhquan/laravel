@extends('user.layout')
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Detail Dayoff To Month</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Detail Dayoff To Month</li>
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
                  <th>Month</th>
                  <th>Total In Month</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)

                  <tr>
                    <td>{{$item->year}}</td>
                    <td>{{$item->month}}</td>
                    <td>{{$item->totalDay}} day</td>
                    {{-- <td class="text-center">
              
                        @if ($item->status === 1 )
                           <p class="text-success"> <i class="fas fa-check"></i></p>
                        @elseif ($item->status === 0 )
                            <p class="text-danger"><i class="fas fa-times"></i></p>
                        @else
                            <p class="text-info">Wating ...</p>
                        @endif
        
                      </td>
                      <td class="option">
                        <a href="#" class="btn btn-primary bg-color">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td> --}}
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