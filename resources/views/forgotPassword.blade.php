<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
</head>
<style>
    body {
        background-image: url('assets/img/background.png');
        background-size: cover;
    }
</style>

<body class="d-flex mt-5 align-items-center justify-content-center">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-white text-white" style="border-radius: 1rem;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <img src="assets/img/logoig.png" alt="logo" style="max-width: 100px; height: auto;">
                            <h3 class="text-dark mb-5 mt-3">Lupa Password</h3>
                            <!-- Display error message -->
                            @if (session('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form class="form-signin" method="POST">
                                @csrf
                                <div class="input-group mb-4 mt-2">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" required autofocus>
                                </div>
                                <div class="d-grid gap-2 mt-4 mb-3">
                                    <button class="btn btn-outline-dark px-5 py-2" type="submit">
                                         Send <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>

                                <a href="{{ route('login') }}" style="text-decoration: none">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/modules/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
