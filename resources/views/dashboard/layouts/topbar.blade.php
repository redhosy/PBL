<nav class="navbar navbar-expand-lg main-navbar bg-primary mb-5">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>

    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user d-flex align-items-center">
            <div class="rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                @if (Auth::user()->profile_photo_path)
                    <img alt="image" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                @else
                    <img alt="image" src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name .'&background=f666b5&color=ffffff&size=150' }}" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                @endif
            </div>
            <div class="user-name ml-2">
                @if (Auth::check())
                    Hi, {{ Auth::user()->name }}
                @else
                    <p>Sesi Anda telah kedaluwarsa. Silakan <a href="{{ route('/login') }}">login</a> kembali.</p>
                @endif
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title text-center">{{ Auth::user()->role }}</div>
            <hr>
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
