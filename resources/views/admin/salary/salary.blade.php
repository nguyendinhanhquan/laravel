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
                        <h3 class="card-title"><i class="fas fa-table"></i> Staff List</h3>

                    </div>
                    <div class="card-header p-0">
                        <div class="salary p-0">
                            <a class="bg-info" href="{{ route('generate-pdf', ['id' => request()->route('id')]) }}"
                            data-toggle="tooltip" data-placement="top" title="Download File PDF Salary Month {{ $month }}"
                                >PDF
                                Download</a>
                            <a href="{{ route('excel', ['id' => request()->route('id')]) }}"
                                class="btn btn-info export border-0 bg-info" id="export-button"
                                data-toggle="tooltip" data-placement="top" title="Download File Excel Salary Month {{ $month }}"
                                > Excel Download </a>
                        </div>
                        {{-- {{ route('export') }} --}}
                    </div>
                    <div class="salary col-12">
                        {{-- <a href="pdf_form">PDF</a> --}}
                        <a class="{{ Request::is('salary/month/1') ? 'active' : '' }}" href="1">January</a>
                        <a class="{{ Request::is('salary/month/2') ? 'active' : '' }}" href="2">February</a>
                        <a class="{{ Request::is('salary/month/3') ? 'active' : '' }}" href="3">March</a>
                        <a class="{{ Request::is('salary/month/4') ? 'active' : '' }}" href="4">April</a>
                        <a class="{{ Request::is('salary/month/5') ? 'active' : '' }}" href="5">May </a>
                        <a class="{{ Request::is('salary/month/6') ? 'active' : '' }}" href="6">June</a>
                        <a class="{{ Request::is('salary/month/7') ? 'active' : '' }}" href="7">July</a>
                        <a class="{{ Request::is('salary/month/8') ? 'active' : '' }}" href="8">August</a>
                        <a class="{{ Request::is('salary/month/9') ? 'active' : '' }}" href="9">September</a>
                        <a class="{{ Request::is('salary/month/10') ? 'active' : '' }}" href="10">October</a>
                        <a class="{{ Request::is('salary/month/11') ? 'active' : '' }}" href="11">November</a>
                        <a class="{{ Request::is('salary/month/12') ? 'active' : '' }}" href="12">December </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Salary Basic</th>
                                    <th>Total Time OT</th>
                                    <th>Salary Month {{ $month }}</th>
                                    <th>Date paid</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $item)

                                    <tr>

                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>
                                            {{ number_format($item->basic_salary, 0, ',', '.') }} VND
                                        </td>


                                        <td>
                                            @if ($item->total_time != 0)
                                                {{ floor($item->total_time / 60) }} hour
                                            @endif
                                        </td>

                                        <td>
                                            {{ number_format($item->basic_salary + floor($item->total_time / 60) * 50000, 0, ',', '.') }}
                                            VND

                                        </td>
                                        <td>
                                            {{ date_format(date_create($carbon), 'd-m-Y') }}
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

    </script>

@endsection
