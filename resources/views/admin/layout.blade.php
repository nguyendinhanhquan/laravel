<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
    <!-- JQVMap -->
    <link rel="stylesheet" href={{ asset('plugins/jqvmap/jqvmap.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{ asset('plugins/daterangepicker/daterangepicker.css') }}>
    <!-- summernote -->
    <link rel="stylesheet" href={{ asset('plugins/summernote/summernote-bs4.css') }}>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href={{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown" data-toggle="tooltip" data-placement="left" title="Notify Request">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        @if ($dayoff + $overtime > 0)
                            <span class="badge badge-danger navbar-badge">
                                {{ $dayoff + $overtime }}
                            </span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{ $dayoff + $overtime }} Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('dayoff') }}" class="dropdown-item">
                            <i class="fas fa-calendar-day mr-2"></i> {{ $dayoff }} Dayoff requests
                            {{-- <span class="float-right text-muted text-sm">3
                                mins</span> --}}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('list-task') }}" class="dropdown-item">
                            <i class="fas fa-clock mr-2"></i> {{ $overtime }} Overtime requests
                            {{-- <span class="float-right text-muted text-sm">12
                                hours</span> --}}
                        </a>
                        {{-- <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        {{-- <a href="#" class="dropdown-item dropdown-footer">See All
                            Notifications</a> --}}
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                        <img src={{ asset('dist/img/AdminLTELogo.png') }} class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">

                        <a href="{{ asset('/admin') }}" class="d-block">
                            @if (Session::get('username'))
                                <h5> {{ Session::get('username') }} </h5>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home "></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ url('admin') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-info "></i>
                                <p>
                                    Admin
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('user') }}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-star"></i>
                                <p>
                                    Staff
                                </p>
                            </a>
                        </li>



                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link
                            {{ Request::is('salary') ? 'active' : '' }}
                            {{ Request::is('salary-basic') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-money-check-alt"></i>
                                <p>
                                    Salary
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ url('salary-basic') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Salary Basic</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('salary/month/' . now()->month) }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Salary of Staff
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link
                            {{ Request::is('list-task') ? 'active' : '' }}
                            {{ Request::is('total-overtime') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-clock"></i>
                                <p>
                                    Overtime
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('new-task-admin') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New task</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('list-task') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List task</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('total-overtime') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Total Time</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link
                            {{ Request::is('dayoff') ? 'active' : '' }}
                            {{ Request::is('dayoff_to_year') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Dayoff
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('dayoff') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List dayoff</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dayoff_to_month') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Detail To Month</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dayoff_to_year') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Detail To Year</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link
                            {{ Request::is('logout') ? 'active' : '' }}
                            {{ Request::is('password') ? 'active' : '' }}
                            ">
                                {{-- <i class="nav-icon fas fa-address-book"></i>
                                --}}
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Option
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ url('password') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change password</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('logout') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content-header')
            </section>

            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">
                @yield('content')
            </section>

            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Code by Anh Quan</strong>

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src={{ asset('plugins/jquery/jquery.min.js') }}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset('plugins/jquery-ui/jquery-ui.min.js') }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- ChartJS -->
    <script src={{ asset('plugins/chart.js/Chart.min.js') }}></script>
    <!-- Sparkline -->
    <script src={{ asset('plugins/sparklines/sparkline.js') }}></script>
    <!-- JQVMap -->
    <script src={{ asset('plugins/jqvmap/jquery.vmap.min.js') }}></script>
    <script src={{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}></script>
    <!-- jQuery Knob Chart -->
    <script src={{ asset('plugins/jquery-knob/jquery.knob.min.js') }}></script>
    <!-- daterangepicker -->
    <script src={{ asset('plugins/moment/moment.min.js') }}></script>
    <script src={{ asset('plugins/daterangepicker/daterangepicker.js') }}></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src={{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
    <!-- Summernote -->
    <script src={{ asset('plugins/summernote/summernote-bs4.min.js') }}></script>
    <!-- overlayScrollbars -->
    <script src={{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('dist/js/adminlte.js') }}></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset('dist/js/pages/dashboard.js') }}></script>
    <!-- AdminLTE for demo purposes -->
    <script src={{ asset('dist/js/demo.js') }}></script>


    <!-- JQuery Validator -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <!-- My Script JS -->
    <script src={{ asset('js/myjs.js') }}></script>

    <section class="script">
        @yield('script')
    </section>

</body>

</html>
