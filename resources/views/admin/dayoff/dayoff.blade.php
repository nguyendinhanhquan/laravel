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
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Dayoff</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                @if (Session::get('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-table"></i> Dayoff List</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Record</th>
                                    <th>Fullname</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)

                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ date_format(date_create($item->start_date), 'd-m-Y') }}</td>
                                        <td>{{ date_format(date_create($item->end_date), 'd-m-Y') }}</td>
                                        <td>{{ $item->reason_day_off }}</td>
                                        <td class="text-center">

                                            @if ($item->status === 1)
                                                <p class="text-success"> <i class="fas fa-check"></i></p>
                                            @elseif ($item->status === 0 )
                                                <p class="text-danger"><i class="fas fa-times"></i></p>
                                            @else
                                                <b><p class="text-info">Wating ...</p></b>
                                            @endif

                                        </td>
                                        <td class="option btn-custom">
                                            {{-- <a href="dayoff/{{ $item->id }}" class="btn btn-primary bg-color mx-1">
                                                <i class="fas fa-info-circle"></i>
                                            </a> --}}
                                            <a href="dayoff/{{ $item->id }}/yes" class="btn btn-primary bg-color mx-1 bg-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="dayoff/{{ $item->id }}/no" class="btn btn-primary bg-color mx-1 bg-danger">
                                                <i class="fas fa-times"></i>
                                            </a>


                                            <a href="#" class="btn btn-primary bg-color "
                                                onclick="deleteJS({{ $item->id }})">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>


                                @endforeach

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>ID Record</th>
                                    <th>Fullname</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>





    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
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
    </div>
    @endsection







    @section('header')

        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

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
                    "searching": true,
                    "order": [[ 0, "desc" ]]
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


            function deleteJS(id) {
                $('.modal').modal();
                $("#delete").click(function() {
                    window.location.href = 'dayoff/delete/' + id;
                })

            }

        </script>
    @endsection
