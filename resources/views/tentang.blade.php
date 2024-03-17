@extends('layouts.main')

@section('content')
    <header class="masthead">
        <div class="container px-5">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="/">Beranda</a>
                            </li>
                            <li aria-current="page" class="breadcrumb-item active">Tentang
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-2 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-2 fw-bold text-capitalize" style="font-size:60px">tentang dasboard <br>
                            sikabeka</h1>
                        <p class="lead fw-normal text-muted mt-2 text-capitalize" style="font-size: 15px">sistem informasi
                            kelompok bidang keahlian</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <!-- Masthead device mockup feature-->
                    <img class=" img-fluid" src="img/gambar2.png" alt="">
                </div>
                <section id="about-deskripsi">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-header">
                                        <h3 class="card-title section-title text-capitalize">Apa itu Sistem Informasi
                                            Kelompok Bidang Keahlian?</h3>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-4">System informasi kelompok bidang keahlian adalah system informasi yang dirancang untuk membantu kegiatan dan kebutuhan informasi serta memudahkan suatu kelompok dalam suatu bidang keahlian tertentu. Sistem ini dirancang untuk membantu dalam pengelolaan data bidang keahlian tertentu. Di system informasi kelompok bidang keahlian kali ini dirancang untuk memfasilitasi pengelompokkan keahlian dosen, jadi system informasi ini membantu dalam pengelolaan data dosen, data jurusan dan program studi, data mata kuliah, data kurikulum dan data ujian mahasiswa. Pada system informasi KBK ini berfungsi mengelola data yang relevan dengan bidang keahlian dosen yang bersangkutan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion mt-5" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 25px">
                                            Tujuan Dashboard Sikabeka
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Dashboard sikabeka memberikan gambaran menyeluruh tentang kinerja atau kondisi dari kelompok itu, misalnya disini adalah kelompok dosen berdasarkan keahliannya. Melalui dashboard ini dapat dengan mudah dalam melakukan pemantauan kinerja kelompok, karena melalui system ini para pemangku kepentingan mendapatakan informasinya. Sehingga informasi yang disampaikan di dashboard dapat mendukung dalam pengambilan keputusan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>
            </div>
        </div>
    </header>
@endsection
