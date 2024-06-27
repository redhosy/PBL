<!-- Navbar Start -->
<nav class="navbar fixed- navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        
        <img src="assets/img/logo2.png" alt="Logo" style="max-height: 50px; width: auto;">
        
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{ Request::is('/')  ? 'active' : '' }}">Home</a>
            <a href="/about" class="nav-item nav-link {{ Request::is('about')  ? 'active' : '' }}">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="/feature" class="dropdown-item">Feature</a>
                    <a href="/team" class="dropdown-item">Our Team</a>
                </div>
            </div>
        </div>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/login" class="btn btn-primary text-white rounded-0 py-4 px-lg-4 d-none d-lg-block nav-link {{ Request::is('active') === 'login' ? 'active' : '' }}">Login<i
                        class=" fas fa-arrow-right ms-3"></i></a>
            </li>
            {{-- @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-fire"></i> Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                          <form action="/logout" method="post">
                            @csrf
                            <button type="submit" name="logout" class="dropdown-item"><i class="fas fa-arrow-left ms-3"></i> Logout</button>
                          </form>
                    </ul>
                </li>
            @else
            @endauth --}}
        </ul>
    </div>
</nav>
<!-- Navbar End -->