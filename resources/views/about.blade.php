@extends('layouts.main')

@section('content')

    <body>
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5">
            <div class="container py-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Feature Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="card text-center p-4">
                            <div class="d-flex justify-content-center mb-3">
                                <div
                                    class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-university text-white"></i>
                                </div>
                            </div>
                            <h1 class="display-4 mb-0" data-toggle="counter-up">{{ \App\Models\ref_jurusans::count() }}</h1>
                            <h5 class="mt-2">Jumlah Jurusan</h5>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="card text-center p-4">
                            <div class="d-flex justify-content-center mb-3">
                                <div
                                    class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-file text-white"></i>
                                </div>
                            </div>
                            <h1 class="display-4 mb-0" data-toggle="counter-up">{{ \App\Models\ref_datakbk::count() }}</h1>
                            <h5 class="mt-2">Jumlah Data KBK</h5>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="card text-center p-4">
                            <div class="d-flex justify-content-center mb-3">
                                <div
                                    class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-list-alt text-white"></i>
                                </div>
                            </div>
                            <h1 class="display-4 mb-0" data-toggle="counter-up">{{ \App\Models\ref_matakuliahkbk::count() }}
                            </h1>
                            <h5 class="mt-2">Jumlah Matkul KBK</h5>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="card text-center p-4">
                            <div class="d-flex justify-content-center mb-3">
                                <div
                                    class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-users text-white"></i>
                                </div>
                            </div>
                            <h1 class="display-4 mb-0" data-toggle="counter-up">{{ \App\Models\ref_dosenkbk::count() }}</h1>
                            <h5 class="mt-2">Jumlah Dosen KBK</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Feature Start -->


        <!-- About Start -->
        <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
            <div class="container about px-lg-0">
                <div class="row g-0 mx-lg-0">
                    <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute img-fluid w-100 h-100" src="img/dashboard.png" alt="Descriptive Alt Text" style="object-fit: cover;">
                        </div>                        
                    </div>
                    <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                        <div class="p-lg-5 pe-lg-0">
                            <h6 class="text-primary">About</h6>
                            <h1 class="mb-4"> Sistem Informasi KBK (Kelompok Bidang Keahlian)</h1>
                            <p>Sistem Informasi KBK (Kelompok Bidang Keahlian) adalah platform terintegrasi yang dirancang
                                khusus untuk mendukung manajemen perkuliahan dan pengelolaan data yang terkait dengan
                                kelompok bidang keahlian dosen. Sistem ini memfasilitasi berbagai fungsi penting dalam
                                lingkup pendidikan, termasuk pengaturan RPS (Rencana Pembelajaran Semester), manajemen data
                                mata kuliah dan dosen KBK, serta pengelolaan soal UAS (Ujian Akhir Semester).</p>
                            <p><i class="fa fa-check-circle text-primary me-3"></i>Pengelolaan RPS yang Efisien</p>
                            <p><i class="fa fa-check-circle text-primary me-3"></i>Manajemen Data Matkul dan Dosen KBK</p>
                            <p><i class="fa fa-check-circle text-primary me-3"></i>Integrasi Data dan Pelaporan</p>
                            <p><i class="fa fa-check-circle text-primary me-3"></i>Pemantauan Kinerja dan Evaluasi
                                Berkelanjutan</p>
                            {{-- <a href="" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Explore More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
                class="bi bi-arrow-up"></i></a>
    </body>
@endsection
