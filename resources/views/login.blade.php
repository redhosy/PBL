<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
</head>
<style>
    body {
        background-image: url('assets/img/background.png');
        background-size: cover;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-white text-white col-sm-12" style="border-radius: 2rem;">
                    <div class="card-body text-center p-4 w-auto">
                        <div class="mb-md-4 mt-md-4">
                            <img src="assets/img/logoig.png" alt="logo" style="max-width: 100px; height: auto;">
                            <h3 class="text-dark mb-4 mt-3">Masuk Ke Akun</h3>
                            {{-- alert login --}}
                            <!-- Alert section -->
                            @if (session('message'))
                                <div class="alert alert-warning fade show" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-warning fade show" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                            {{-- login form --}}
                            <form class="form-signin" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" required autofocus>
                                </div>

                                <div class="input-group mt-4 mb-3">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password" required>
                                </div>

                                <div class="input-group d-flex justify-content-between align-items-center mb-2">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" name="terms"
                                            required>
                                        <label class="form-check-label small text-dark" for="terms">Saya setuju
                                            dengan
                                            <a href="/terms">syarat dan ketentuan</a>
                                        </label>
                                    </div>
                                    <a class="text-dark-50 small" href="/forgotPassword">Forgot password?</a>
                                </div>

                                <div class="mt-5 mb-2">
                                    <button class="btn btn-outline-dark px-3 py-1" type="submit">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
