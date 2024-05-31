<!-- Navigation-->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm" id="mainNav" style="background : linear-gradient(#7469B6, #7469B6)">
    <div class="container px-5">
        <img class="img-fluid" src="img/logo2.png" alt="" width="50px">
        <a class="navbar-brand fw-bold text-light mx-2" href="/">SIKABEKA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-list-ul"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-5 my-3 my-lg-0 text-center">
                <li class="nav-item"><a class="nav-link me-lg-3 " href="#">Explorasi Dashboard</a></li>
                <li class="nav-item {{ Request::is('tentang') ? 'active' : '' }}"><a class="nav-link me-lg-3 " href="/tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3 btn btn-outline-dark py-2 px-3 rounded-pill" href="/login">Masuk Ke Akun</a></li>
            </ul>
        </div>
    </div>
</nav>