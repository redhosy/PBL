<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
                            <h3 class="text-dark mb-5 mt-3">Reset Password</h3>

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

                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="input-group mb-4 mt-2">
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="Email" required autofocus>
                                </div>

                                <div class="input-group mb-4 mt-2">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="New Password" required>
                                </div>

                                <div class="input-group mb-4 mt-2">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                        placeholder="Confirm New Password" required>
                                </div>

                                <div class="d-grid gap-2 mt-4 mb-3">
                                    <button class="btn btn-dark px-5 py-2" type="submit">
                                         Reset Password <i class="fas fa-key"></i>
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

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
