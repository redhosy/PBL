<!-- Navbar Start -->
<nav class="navbar fixed-top navbar-expand-lg bg-white navbar-light p-0">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5" href="#">
            <div class="d-flex align-items-center">
                <img src="assets/img/logo2.png" alt="Logo" style="max-height: 50px; width: auto;">
                <h5 class="mb-0 ms-2 text-success" style="font-size: 1.50rem;">SIKABEKA</h5>
            </div>
        </a>    
    
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="home" class="nav-item nav-link {{ Request::is('home')  ? 'active' : '' }}">Home</a>
                <a href="about" class="nav-item nav-link {{ Request::is('about')  ? 'active' : '' }}">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="feature" class="dropdown-item">RPS</a>
                        {{-- <a href="/team" class="dropdown-item">Our Team</a> --}}
                    </div>
                </div>
                <div class="nav-item">
                    <a href="login" class="btn btn-primary text-white rounded-0 py-2 px-4 d-flex justify-content-center align-items-center mt-2 mt-lg-0 ms-lg-2 nav-link {{ Request::is('active') === 'login' ? 'active' : '' }}">
                        Login<i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
