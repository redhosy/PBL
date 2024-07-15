<!doctype html>
<html lang="en">

<head>
    <title>ButtonApi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
</head>

<body>
    <div class="container justify-content-center">
        <button class="btn btn-sm btn-primary" id="fetching">Fetch Api</button>
        <span id="status"></span>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script> --}}
    {{-- <script src=" https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    {{-- <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> --}}
    <script>
        $('#fetching').on('click', function() {
            
            document.getElementById('status').innerHTML = ``;
            $.ajax({
                type: "GET",
                url: "/fetchingKurikulum",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching kurikulum</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching kurikulum</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching kurikulum</p>';
                }
            });
            $.ajax({
                type: "GET",
                url: "/fetchingMatakuliah",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching matakuliah</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching matakuliah</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching matakuliah</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingDosenMatkul",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching DosenMatkul</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching DosenMatkul</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching DosenMatkul</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingDosen",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching Dosen</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching Dosen</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching Dosen</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingKelas",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching Kelas</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching Kelas</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching Kelas</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingJurusan",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching Jurusan</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching Jurusan</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching Jurusan</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingPimJur",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching Pimjur</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching Pimjur</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching Pimjur</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingProdi",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching Prodi</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching Prodi</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching Prodi</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingPimProd",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching Pimprod</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching Pimprod</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching Pimprod</p>';
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchingSmt_thn_akd",
                dataType: "json",
                beforeSend: function() {
                    document.getElementById('status').innerHTML += '<p>memulai fetching Smt_thn_akd</p>';
                },
                success: function(response) {
                    document.getElementById('status').innerHTML += '<p>selesai fetching Smt_thn_akd</p>';
                },
                error: function(errosr) {
                    document.getElementById('status').innerHTML += '<p>gagal fetching Smt_thn_akd</p>';
                }
            });
        });
        
    </script>
</body>

</html>