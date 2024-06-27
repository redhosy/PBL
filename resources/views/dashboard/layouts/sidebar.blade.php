<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand mb-4">
      <img src="assets/img/logoig.png" alt="logo" class="mt-3 mb-3" style="width: 30%">
    </div>
    
    <ul class="sidebar-menu mt-4">
      <li class="menu-header">Dashboard</li>
      <li>
        <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li> 

      @can('admin')
      <li class="dropdown">
        <a class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Jurusan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/dajur">Data Jurusan</a></li>
          <li><a class="nav-link" href="/dapinjur">Pimpinan Jurusan</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Program Studi</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/dapro">Data Program Studi</a></li>
          <li><a class="nav-link" href="/dapinprod">Pimpinan Prodi</a></li>
        </ul>
      </li>

      <li>
        <a href="/dados" class="nav-link"><i class="fas fa-user"></i><span>Dosen</span></a>
      </li> 

      <li>
        <a class="nav-link" href="/dakur"><i class="fas fa-book"></i><span>Kurikulum</span></a>
      </li> 

      <li class="dropdown">
        <a class="nav-link has-dropdown"><i class="fas fa-landmark"></i><span>Perkuliahan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/matkul">Matakuliah</a></li>
          <li><a class="nav-link" href="/dosenmatkul">Dosen Matakuliah</a></li>
          <li><a class="nav-link" href="/kelas">Kelas</a></li>
        </ul>
      </li>

      <li>
        <a href="/thnakad" class="nav-link"><i class="fas fa-calendar"></i><span>Tahun Akademik</span></a>
      </li> 

      {{-- <li>
        <a href="/" class="nav-link"><i class="fas fa-book"></i><span>Proposal</span></a>
      </li> 

      <li>
        <a href="/" class="nav-link"><i class="fas fa-users"></i><span>Mahasiswa</span></a>
      </li>  --}}


      <li class="menu-header">Kelompok Bidang Keahlian</li>
      <li class="dropdown mb-5" >
        <a class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>KBK</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/datakbk">Data KBK</a></li>
          <li><a class="nav-link" href="/dosenkbk">Dosen KBK</a></li>
          <li><a class="nav-link" href="{{ route('matkulkbk.index') }}">Matkul KBK</a></li>
        </ul>
      </li>
      @endcan

      @can('dosen-pengampu')
      <li class="dropdown">
        <a class="nav-link has-dropdown"><i class="fa fa-upload"></i><span>Layanan KBK</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/RPS">Unggah RPS</a></li>
          <li><a class="nav-link" href="/soalUas">Unggah Soal UAS</a></li>
          <li><a class="nav-link" href="/dosenmatkul">Dosen Matakuliah</a></li>
        </ul>
      </li>
      @endcan

      @can('pengurus-kbk')
      <li class="dropdown" >
        <a class="nav-link has-dropdown"><i class="fa fa-clipboard-check"></i><span>Verifikasi</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href={{ route('RPS.index') }}>Verifikasi RPS</a></li>
          <li><a class="nav-link" href={{ route('verifikasiRPS.index') }}>Berita Acara RPS</a></li>
          <li><a class="nav-link" href={{ route('soalUas.index') }}>Verifikasi Soal</a></li>
          <li><a class="nav-link" href={{ route('verifikasiSoal.index') }}>Berita Acara Soal</a></li>
        </ul>
      </li>
      @endcan

      @can('pimpinan-prodi')
      <li class="dropdown" >
        <a class="nav-link has-dropdown"><i class="fa fa-clipboard-check"></i><span>Menu KBK</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href={{ route('kaprodi.rps.index') }}>Daftar RPS</a></li>
          <li><a class="nav-link" href={{ route('kaprodi.soal-uas.index') }}>Daftar Soal-UAS</a></li>
          <li><a class="nav-link" href={{ route('kaprodi.laporan.index') }}>Laporan</a></li>
        </ul>
      </li>
      @endcan

      @can('super-admin')
      <li>
        <a href="/pengguna" class="nav-link"><i class="fas fa-users"></i><span>Pengguna</span></a>
      </li>   
      @endcan
    </ul>
  </aside>
</div>
