<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/login.css">

</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-lg-6 col-xl-4">
                <div class="card bg-white text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <img src="img/logoig.png" alt="logo" style="max-width: 100px; height: auto;">
                            <h3 class="text-dark mb-4 mt-3">Masuk Ke Akun</h3>
                            <form class="form-signin" method="post" action="">
                                
                                <div class="input-group mb-4 mt-2">
                                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                                </div>
    
                                <div class="input-group mb-4">
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                </div>
                            </form>
                            <div class="input-group mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" name="terms"
                                        required>
                                    <label class="form-check-label small text-dark" for="terms">Saya setuju dengan 
                                        <a href="/terms">syarat dan ketentuan</a></label>
                                </div>
                                <a class="text-dark-50 small mt-3" href="#!">Forgot password?</a>
                            </div>                            
                            <div class="d-grid gap-2 mt-4 mb-3">
                                <button class="btn btn-outline-dark px-5 py-2" type="submit">Masuk</button>
                            </div>
                        </div>
                        <div>
                            <p class="mb-0 small text-dark">Belum Punya Akun? <a href="/register" class="text-dark-50 fw-bold">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
