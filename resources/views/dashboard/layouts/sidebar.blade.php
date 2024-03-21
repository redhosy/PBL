<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark" style="background-color: #7469B6" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <img class="img-fluid" src="img/logo2.png" alt="" width="50px">
      <div class="sidebar-brand-text mx-2">SIKABEKA</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link {{ Request::is('dashboard')?'active':'' }}" href="/dashboard">
        <i class="fas fa-columns"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  {{-- <li class="nav-item">
    {{-- <a class="nav-link {{ Request::is('dashboard/posts*')? 'active' : '' }}"  href="/dashboard/posts"> --}}
    {{-- <a class="nav-link"  href="">
        <i class="fas fa-table"></i>
          <span>Data Jurusan</span>
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-book-open"></i>
          <span>Program Studi</span>
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-user"></i>
          <span>Dosen</span>
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-calendar-alt"></i>
          <span>Tahun Akademik</span>
      </a>
  </li>  --}}

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-university"></i>
        <span>Data Kampus</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('dajur') ? 'active': '' }}" href="/dajur">Data Jurusan</a>
            <a class="collapse-item {{ Request::is('dapro') ? 'active': '' }}" href="/dapro">Program Studi</a>
            <a class="collapse-item {{ Request::is('dados') ? 'active': '' }}" href="/dados">Dosen</a>
            <a class="collapse-item {{ Request::is('thnakad') ? 'active': '' }}" href="/thnakad">Tahun Akademik</a>
        </div>
    </div>
  
  <!-- Divider -->
  {{-- <hr class="sidebar-divider"> --}}

  <!-- Heading -->
  {{-- <div class="sidebar-heading">
      Addons
  </div> --}}

  <!-- Nav Item - Pages Collapse Menu -->
  {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Login Screens:</h6>
              <a class="collapse-item" href="login.html">Login</a>
              <a class="collapse-item" href="register.html">Register</a>
              <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Other Pages:</h6>
              <a class="collapse-item" href="404.html">404 Page</a>
              <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">


</ul>
<!-- End of Sidebar -->