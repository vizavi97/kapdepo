<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KapDepo Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('style/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Toastr -->
    <link rel="stylesheet" href="{{asset('style/plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('style/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/nestable.css') }}">

    {{--Main style--}}
    <link rel="stylesheet" href="{{asset('style/main.css')}}">

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script src="{{asset('style/plugins/jquery/jquery.min.js')}}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    Выход
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @include('admin.side-bar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-{{ date('Y') }}.</strong>
        Все права защищены.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{--<script src="{{asset('style/plugins/jquery/jquery.min.js')}}"></script>--}}
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('style/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('style/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('style/plugins/inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('style/plugins/moment/moment.min.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{asset('style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

{{-- CKeditor--}}
<script src="{{asset('style/plugins/toastr/toastr.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('style/dist/js/adminlte.js')}}"></script>
<script src="{{asset('js/nestable.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset('js/main.js')}}"></script>--}}
<script src="{{asset('style/dist/js/demo.js')}}"></script>
<script type="text/javascript">

    $(function() {
        toastr.options = {
            "positionClass": "toast-bottom-center",
        }
    })
</script>
@stack('scripts')


</body>
</html>
