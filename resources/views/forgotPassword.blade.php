<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
    <style>
        body {
            background-image: url('{{ asset('assets/img/background.png') }}');
            background-size: cover;
        }
        .card {
            border-radius: 1rem;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-white">
                    <div class="card-body p-4 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <img src="{{ asset('assets/img/logoig.png') }}" alt="logo" style="max-width: 100px; height: auto;">
                            <h3 class="text-dark mb-5 mt-3">Lupa Password</h3>
                            
                            <!-- Display error message -->
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @elseif ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="input-group mb-4 mt-2">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" required autofocus>
                                </div>
                                <div class="d-grid gap-2 mt-4 mb-3">
                                    <button class="btn btn-dark px-5 py-2" type="submit">
                                         Send <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>

                                <a href="{{ route('login') }}" class="text-decoration-none">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
