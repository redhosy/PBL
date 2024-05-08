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
      Daftar Data
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-university"></i>
        <span>Data Jurusan</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('dajur') ? 'active': '' }}" href="/dajur">Data Jurusan</a>
            <a class="collapse-item {{ Request::is('dapro') ? 'active': '' }}" href="/dapro">Program Studi</a>
            <a class="collapse-item {{ Request::is('dados') ? 'active': '' }}" href="/dados">Dosen</a>
            <a class="collapse-item {{ Request::is('thnakad') ? 'active': '' }}" href="/thnakad">Tahun Akademik</a>
        </div>
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-solid fa-book"></i>
            <span>Data Akademik</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('dapinjur') ? 'active': '' }}" href="/dapinjur">Pimpinan Jurusan</a>
                <a class="collapse-item {{ Request::is('dapinprod') ? 'active': '' }}" href="/dapinprod">Pimpinan Program Studi</a>
                <a class="collapse-item {{ Request::is('dakur') ? 'active': '' }}" href="/dakur">Kurikulum Program Studi</a>
                <a class="collapse-item {{ Request::is('matkul') ? 'active': '' }}" href="/matkul">Mata Kuliah</a>
            </div>
        </div>
  
  <!-- Divider -->
  <hr class="sidebar-divider">

  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
        aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-solid fa-book-open"></i>
        <span>Daftar Data KBK</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('datakbk') ? 'active': '' }}" href="/datakbk">Data KBK</a>
            <a class="collapse-item {{ Request::is('/') ? 'active': '' }}" href="/dapro">Dosen KBK</a>
        </div>
    </div>  --}}

  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link {{ Request::is('datakbk') ? 'active': '' }}" href="/datakbk">
          <i class="fas fa-solid fa-book"></i>
          <span>Data KBK</span></a>
  </li>
</ul>
<!-- End of Sidebar -->