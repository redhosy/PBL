@extends('layouts.main')

@section('content')

    <body>
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5">
            <div class="container py-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">RPS</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="/feature">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">RPS</li>
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


        <!-- Feature Start -->
        <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
            <div class="container feature px-lg-0">
                <div class="row g-0 mx-lg-0">
                    <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                        <div class="p-lg-5 ps-lg-0">
                            <h6 class="text-primary">RPS</h6>
                            <h1 class="mb-4">Rancangan Pembelajaran Semester</h1>
                            <p class="mb-4 pb-2">Rencana proses pembelajaran yang disusun untuk kegiatan pembelajaran selama
                                satu semester guna memenuhi capaian pembelajaran yang telah ditetapkan oleh program studi.
                            </p>
                            <h5 class="mb-4">Daftar RPS:</h5>
                            <div class="list-group">
                                <!-- Example of a document entry -->
                                <a href="path/to/document1.pdf" class="list-group-item list-group-item-action"
                                    target="_blank">
                                    RPS Semester Ganjil 2023/2024
                                </a>
                                <a href="path/to/document2.pdf" class="list-group-item list-group-item-action"
                                    target="_blank">
                                    RPS Semester Genap 2022/2023
                                </a>
                                <!-- More document entries -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute img-fluid w-100 h-100" src="img/rps.jpg"
                                style="object-fit: cover;" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->

    </body>
@endsection
