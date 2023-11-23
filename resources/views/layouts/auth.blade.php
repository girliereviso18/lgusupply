<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Supply Management System - Bontoc</title>
        <link rel="icon" href="{{asset('adminassets/uploads/Bontoc.png')}}" />
  
        <link rel="stylesheet" href="{{asset('adminassets/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminassets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminassets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('adminassets/dist/css/adminlte.css')}}">
        <link rel="stylesheet" href="{{asset('adminassets/dist/css/custom.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/summernote/summernote-bs4.min.css')}}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{asset('adminassets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <style>
            body{
              background-image: url("{{asset('adminassets/uploads/mncpyo.jpg')}}");
              background-size:cover;
              background-repeat:no-repeat;
            }
            .login-title{
              text-shadow: 2px 2px black
            }
        </style>
    </head>
    <body class="hold-transition login-page  dark-mode">
        @yield('content')
     
    <!-- jQuery -->
    <script src="{{asset('adminassets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('adminassets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('adminassets/plugins/sweetalert2/sweetalert2.min.js')}}h"></script>
    <!-- Toastr -->
    <script src="{{asset('adminassets/plugins/toastr/toastr.min.js')}}"></script>
    <script>
        var _base_url_ = "{{ url('/')}}";
    </script>
    <script src="{{asset('adminassets/dist/js/script.js')}}"></script>
    <!-- jQuery -->
    <script src="{{asset('adminassets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminassets/dist/js/adminlte.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            start_loader()
            end_loader();
        })
    </script>
    </body>
</html>     