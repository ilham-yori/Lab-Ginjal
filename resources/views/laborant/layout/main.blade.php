<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ url('') }}/img/ladang_icon.png" rel="icon">


    <title>Laboratorium Ginjal {{ ($title != '') ? '| ' . $title : '' }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="{{ url('') }}/vendor/ckeditor/ckeditor.js"></script>
</head>

<body id="page-top">
    @include('sweetalert::alert')
    <div id="wrapper">
        {{-- Sidebar --}}
        @include('laborant.layout.sidebar')
        {{-- End of Sidebar --}}

        {{-- Content --}}
        <div id="content-wrapper" class="d-flex flex-column">
            {{-- Main Content --}}
            <div id="scanner">
                {{-- Top Bar --}}
                @include('laborant.layout.navbar')
                {{-- End of Top Bar --}}

                {{-- Page Content --}}
                <div class="container-fluid">
                    @yield('scanner')
                </div>
                {{-- End of Page Content --}}
            </div>
            {{-- End of Main Content --}}
        </div>
        {{-- End of Content --}}
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ url('') }}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ url('') }}/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="{{ url('') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('') }}/js/demo/datatables-demo.js"></script>
</body>

</html>
