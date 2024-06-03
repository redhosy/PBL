<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIKABEKA | @yield('title')</title>
    <!-- General CSS Files -->
    <script src="assets/modules/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Start GA -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body class="d-flex flex-column min-vh-100 body-shift-right">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- Top Bar -->
        @include('Dashboard.layouts.topbar')
        <!-- End Top Bar -->

        <!-- Sidebar -->
        @include('Dashboard.layouts.sidebar')
        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid mt-4">
                @section('section-header')
                    <h1>@yield('title')</h1>
                @endsection
                    @yield('content')
            </div>
        </div>
        <!-- End Main Content -->

        <!-- Footer -->
        <footer class="main-footer bg-dark text-white text-center py-2 mt-auto">
            <div class="footer-left">
                <p>&copy; 2024 - Sistem Informasi KBK</p>
            </div>
            <div class="footer-right"></div>
        </footer>
        <!-- End Footer -->
    </div>

    <!-- General JS Scripts -->
    <script src="assets/page/bundle.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraries -->
    <script src="assets/modules/jquery.sparkline.min.js"></script>
    <script src="assets/modules/chart.min.js"></script>
    <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>
    <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- Additional JS Libraries -->
    <script src="assets/js/page/modules-chartjs.js"></script>
    <script src="assets/js/page/bootstrap-modal.js"></script>
</body>

</html>
