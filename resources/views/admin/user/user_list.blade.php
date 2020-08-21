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
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
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
                        @if (Session::get('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <h3 class="card-title"><i class="fas fa-table"></i> Staff</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Birthday</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <a data-toggle="tooltip" data-placement="top" title="Detail info user" class="text-dark" href="user/{{ $item->id }}"><u>{{ $item->fullname }}</u></a>
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ date_format(date_create($item->birthday), 'd-m-Y') }}</td>
                                        <td class="text-center">
                                            @if ($item->status === 1)
                                                <p class="text-success"> <i class="fas fa-check"></i></p>
                                            @else
                                                <p class="text-danger"><i class="fas fa-times"></i></p>
                                            @endif

                                        </td>

                                        <td class="option btn-custom">
                                            <a  href="user/active/{{ $item->id }}"
                                                class="btn btn-primary bg-color mx-1 bg-success"
                                                data-toggle="tooltip" data-placement="top" title="Active user"
                                                >
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="user/disable/{{ $item->id }}"
                                                class="btn btn-primary bg-color mx-1 bg-danger"
                                                data-toggle="tooltip" data-placement="top" title="Disable user"
                                                >
                                                <i class="fas fa-times"></i>
                                            </a>


                                            @if ($item->status !== 1)
                                                <button class="btn btn-primary bg-color " onclick="deleteJS({{ $item->id }})" 
                                                    data-toggle="tooltip" data-placement="top" title="Delete user"
                                                    >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-primary bg-color " disabled
                                                data-toggle="tooltip" data-placement="top" title="Delete user"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endif
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
                "order": [
                    [0, "desc"]
                ],
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
                window.location.href = 'user/delete/' + id;
            })

        }

    </script>

@endsection
