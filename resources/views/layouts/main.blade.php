<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIKABEKA | Home</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .d-none {
            display: none;
        }

        .invalid-feedback {
            display: none;
        }

        .btn.disabled {
            pointer-events: none;
            opacity: 0.65;
        }
    </style>
</head>

<body id="page-top">
    @include('partials.navbar')

    <!-- Mashead header-->
    @yield('content')


    <!-- Footer-->
    @include('partials.footer')

    <!-- Bootstrap core JS-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <script>
        // Fungsi untuk memulai animasi count saat elemen masuk ke dalam viewport
        function startCountAnimation() {
            var countElements = document.querySelectorAll('.count');

            countElements.forEach(function(element) {
                var start = 0;
                var end = parseInt(element.innerText);
                var duration = 25000;
                var step = Math.ceil(end / (duration / 100));

                function updateCount() {
                    start += step;
                    start = Math.min(start, end);
                    element.textContent = start;
                    if (start < end) {
                        requestAnimationFrame(updateCount);
                    }
                }

                updateCount();
            });
        }

        // Fungsi untuk memeriksa apakah elemen masuk ke dalam viewport
        function isInViewport(element) {
            var bounding = element.getBoundingClientRect();
            return (
                bounding.top >= 0 &&
                bounding.left >= 0 &&
                bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Fungsi untuk menambahkan kelas 'visible' ketika elemen masuk ke dalam viewport
        function handleScroll() {
            var servicediv = document.querySelector('.servicediv');
            if (isInViewport(servicediv)) {
                servicediv.classList.add('visible');
                startCountAnimation(); // Mulai animasi count saat elemen masuk ke dalam viewport
                window.removeEventListener('scroll', handleScroll); // Hapus event listener setelah animasi dimulai
            }
        }

        // Tambahkan event listener untuk mendeteksi scroll
        window.addEventListener('scroll', handleScroll);
    </script>
</body>

</html>
