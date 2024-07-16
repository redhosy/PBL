 <!-- topbar.blade.php -->

<nav class="navbar navbar-expand-lg main-navbar bg-primary mb-5">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>

    <ul class="navbar-nav navbar-right ml-auto">
        @can('dosen-pengampu')
            <li class="dropdown dropdown-list-toggle">
                <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">Notifications
                        <div class="float-right">
                            <a href="#" id="mark-all-read-btn">Mark All As Read</a>

                        </div>
                    </div>
                    <div class="dropdown-list-content dropdown-list-icons">
                        <!-- Placeholder for notifications -->
                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li>
        @endcan

        <li class="dropdown ml-2">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user d-flex align-items-center">
                <div class="rounded-circle overflow-hidden" style="width: 30px; height: 30px;">
                    @if (Auth::user()->profile_photo_path)
                        <img alt="image" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                    @else
                        <img alt="image" src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&background=f666b5&color=ffffff&size=150' }}" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
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
                        <i class="fas fa-bolt"></i> Activity Logs
                    </a>
                @endcan
                <div class="dropdown-divider"></div>
                <a href="/" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ambil data notifikasi saat halaman dimuat
        $.ajax({
            url: '/notifications',
            type: 'GET',
            success: function(data) {
                // Proses data notifikasi yang diterima
                var notifications = data;
                var notificationContent = '';
                
                notifications.forEach(function(notification) {
                    // Format waktu menggunakan fungsi JavaScript Date
                    var createdAt = new Date(notification.created_at);
                    // Format tanggal ke dalam format yang lebih ramah, misalnya "2 hours ago"
                    var timeAgo = timeDifference(new Date(), createdAt);
                    
                    notificationContent += '<a href="#" class="dropdown-item">';
                    notificationContent += '<div class="dropdown-item-icon bg-success text-white">';
                    notificationContent += '<i class="fas fa-check"></i>';
                    notificationContent += '</div>';
                    notificationContent += '<div class="dropdown-item-desc">';
                    notificationContent += '<p><strong>' + notification.message + '</strong></p>';
                    notificationContent += '<small class="text-muted">' + timeAgo + '</small>';
                    notificationContent += '</div>';
                    notificationContent += '</a>';
                });
                
                $('.dropdown-list-content').html(notificationContent);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        // Fungsi untuk menghitung perbedaan waktu dalam format yang lebih ramah
        function timeDifference(current, previous) {
            var msPerMinute = 60 * 1000;
            var msPerHour = msPerMinute * 60;
            var msPerDay = msPerHour * 24;
            var msPerMonth = msPerDay * 30;
            var msPerYear = msPerDay * 365;

            var elapsed = current - previous;

            if (elapsed < msPerMinute) {
                return Math.round(elapsed / 1000) + ' seconds ago';
            } else if (elapsed < msPerHour) {
                return Math.round(elapsed / msPerMinute) + ' minutes ago';
            } else if (elapsed < msPerDay) {
                return Math.round(elapsed / msPerHour) + ' hours ago';
            } else if (elapsed < msPerMonth) {
                return Math.round(elapsed / msPerDay) + ' days ago';
            } else if (elapsed < msPerYear) {
                return Math.round(elapsed / msPerMonth) + ' months ago';
            } else {
                return Math.round(elapsed / msPerYear) + ' years ago';
            }
        }

        // Handler untuk klik pada tombol "Mark All As Read"
        $('#mark-all-read-btn').click(function(e) {
            e.preventDefault();

            // Kirim permintaan Ajax untuk menghapus semua notifikasi
            $.ajax({
                url: '/notifications/mark-all-read',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Hapus semua notifikasi dari tampilan dropdown
                    $('.dropdown-list-content').empty();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
