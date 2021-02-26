<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Tracking Covid</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css') }}">


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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" role="button">
                        <i class="fas fa-sign-out"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset ('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Angsam</span>
            </a>



            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="img/ang-nav.jpg" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="" class="d-block">Raihan Fadzan Aldy</a>
                                <div class="dropdown-divider"></div>

                                </a>
                            </div>

                        </div>



                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-globe-asia text-info"></i>
                                <p>
                                    Kasus Indonesia
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('provinsi.index') }}" class="nav-link">
                                        <i class="fas fa-map-marker-alt nav-icon"></i>
                                        <p>Provinsi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=" {{ route('kota.index') }} " class="nav-link">
                                        <i class="fas fa-map-marker-alt nav-icon"></i>
                                        <p>Kota</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kecamatan.index') }}" class="nav-link">
                                        <i class="fas fa-map-marker-alt nav-icon"></i>
                                        <p>Kecamatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kelurahan.index') }}" class="nav-link">
                                        <i class="fas fa-map-marker-alt nav-icon"></i>
                                        <p>Kelurahan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('rw.index') }}" class="nav-link">
                                        <i class="fas fa-map-marker-alt nav-icon"></i>
                                        <p>RW</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kasus.index') }}" class="nav-link">
                                        <i class="fas fa-map-marker-alt nav-icon"></i>
                                        <p>Jumlah Kasus</p>
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
        <div class="content-header">
            <div class="container-fluid">
                <div class="text-center">
                    <h1 class="m-0"><b>DATA KASUS DI INDONESIA</b></h1>
                </div><!-- /.col -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="responsive">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="row">

                        <div class="col-sm-4 text-center">
                            <div class="card text-white bg-orange mb-6" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h3 class="h4 mb-2 text-white">Total <br> Positif</h3>
                                    <i class="fas fa-6x fas fa-plus text-white mb-4"></i>
                                    <p class="text-white h3 mb-4"><span data-toggle="counter-up">{{ $positif }}</span></p>
                                    <text class="text-white mb-0">Orang</text>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 text-center">
                            <div class="card text-white bg-success mb-6" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">Total Sembuh</h3>
                                    <i class="fas fa-6x fas fa-heartbeat text-white mb-4"></i>
                                    <p class="text-white h3 mb-4"><span data-toggle="counter-up">{{ $sembuh }}</span></p>
                                    <p class="text-white mb-0">Orang</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 text-center">
                            <div class="card text-white bg-danger mb-6" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">Total Meninggal</h3>
                                    <i class="fas fa-6x fas fa-skull-crossbones text-white mb-4"></i>
                                    <p class="text-white h3 mb-4"><span data-toggle="counter-up">{{ $meninggal }}</span></p>
                                    <p class="text-white mb-0">Orang</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0-rc
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{asset('assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ('assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ('assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset ('assets/dist/js/pages/dashboard.js') }}"></script>


</body>

</html>