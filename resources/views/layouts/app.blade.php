<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.cs') }} "">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/icheck-bootstrap/icheck-bootstrap.min.cs') }} "">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/jqvmap/jqvmap.min.cs') }} ">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('inc/dist/css/adminlte.min.css') }} ">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/daterangepicker/daterangepicker.css') }} ">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/summernote/summernote-bs4.min.css') }} ">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('inc/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('inc/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('inc/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('layouts.navigation')
            @include('layouts.sidebar')

            <!-- Page Heading -->
            <!-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    
                </div>
            </header> -->

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
                <!-- jQuery -->
        <script src="{{ asset('inc/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('inc/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('inc/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('inc/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('inc/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('inc/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('inc/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('inc/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('inc/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('inc/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('inc/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('inc/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('inc/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <script>
            $(function () {
                $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "paging":false,"info":false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
        <script>
            $(function(){
                $('#a_id').change(function(){
                    const price = $(this).children(':selected').data('price');
                    $('#a_price').val(price);
                    $('.asset_price').val(price);
                });

                $('input[name=paid]').change(function(){
                    let paid = $(this).val();
                    let total = $('input[name=total]').val();
                    console.log(paid);
                    
                    let pending = total-paid;
                    $('input[name=pending]').val(pending);
                    $('#pending').val(pending);
                });
            })
        </script>
        <!-- AdminLTE App -->
        <script src="{{ asset('inc/dist/js/adminlte.js') }}"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('inc/dist/js/pages/dashboard.js') }}"></script>
    </body>
</html>
