<nav class="navbar navbar-expand-lg main-navbar bg-primary mb-5">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/redo.png" class="rounded-circle mr-1">
                @if (Auth::check())
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                @else
                    <p>Sesi Anda telah kedaluwarsa. Silakan <a href="{{ route('/login') }}">login</a> kembali.</p>
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                @can('super-admin')
                    <a href="activity" class="dropdown-item has-icon">
                        <i class="fas fa-bolt"></i> Activity Logs</a>
                @endcan
                <div class="dropdown-divider"></div>
                <a href="/" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
