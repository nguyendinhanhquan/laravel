@extends('user.layout')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My task</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user_home') }}">Home</a></li>
                        <li class="breadcrumb-item active">My task</li>
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

            @if (Session::get('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My task</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>


                            <tr>
                                <th>ID Task</th>
                                <th>Day OT</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total Time</th>
                                <th>Task Name</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if ($item->date_ot != null)
                                         {{ date_format(date_create($item->date_ot), 'd-m-Y') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->start_time != null)
                                            {{ date_format(date_create($item->start_time), 'H:i') }}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->start_time != null)
                                            {{ date_format(date_create($item->end_time), 'H:i') }}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->total_time != 0)
                                            {{ $item->total_time }} minutes
                                        @endif
                                    </td>
                                    <td>{{ $item->task_name }}</td>
                                    <td class="text-center">

                                        @if ($item->status === 1)
                                            <p data-toggle="tooltip" data-placement="top" title="Admin reject" class="text-success"> <i class="fas fa-check"></i></p>
                                        @elseif ($item->status === 0 )
                                            <p data-toggle="tooltip" data-placement="top" title="Admin approve" class="text-danger"><i class="fas fa-times"></i></p>
                                        @elseif ($item->status === 3 )
                                            <b >
                                                <p data-toggle="tooltip" data-placement="top" title="Task is sending to admin" class="text-warning">Sending</p>
                                            </b>
                                        @else
                                            <b >
                                                <p data-toggle="tooltip" data-placement="top" title="New task" class="text-info">New</p>
                                            </b>
                                        @endif

                                    </td>
                                    <td class="option">
                                        <a href="my-task/{{ $item->id }}" class="btn btn-primary bg-color"
                                            data-toggle="tooltip" data-placement="top" title="Task detail"
                                            >
                                            <i class="fas fa-info-circle"></i>
                                        </a>

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

    <!-- Modal HTML -->
    {{-- <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                </div>
            </div>
        </div>
    </div> --}}
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "searching": false,
                "order": [
                    [0, "desc"]
                ]

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
        $(function() {

            $('#reservationdate1').datetimepicker({
                format: "DD-MM-YYYY",

            })

            $('#reservationdate2').datetimepicker({
                format: "DD-MM-YYYY",
            })



        });

        function deleteJS(id) {
            $('.modal').modal();
            $("#delete").click(function() {
                window.location.href = 'my-task/delete/' + id;
            })

        }

    </script>

@endsection
