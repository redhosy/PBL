@extends('layouts.main')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel1.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-2 text-white animated slideInDown">Maksimalkan Pembelajaran dengan Sikabeka</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Sikabeka Meningkatkan Efisiensi dan Kualitas Perkuliahan dengan Mengintegrasikan Keahlian dan Kolaborasi Antar Dosen.</p>
                            {{-- <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel2.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-2 text-white animated slideInDown">Transformasi Perkuliahan Melalui Sikabeka</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Mengintegrasikan Keahlian, Meningkatkan Kolaborasi, dan Menciptakan Pengalaman Belajar yang Lebih Kaya dan Mendalam.</p>
                            {{-- <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel3.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-2 text-white animated slideInDown">Inovasi Perkuliahan dengan Sistem Kelompok Bidang Keahlian Dosen</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Optimalkan Pembelajaran dengan Kolaborasi Dosen yang Terfokus dan Berbasis Keahlian untuk Memajukan Pendidikan Berkualitas.</p>
                            {{-- <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Feature Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="card text-center p-4">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
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
                        <div class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
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
                        <div class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa fa-list-alt text-white"></i>
                        </div>
                    </div>
                    <h1 class="display-4 mb-0" data-toggle="counter-up">{{ \App\Models\ref_matakuliahkbk::count() }}</h1>
                    <h5 class="mt-2">Jumlah Matkul KBK</h5>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="card text-center p-4">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="btn-lg-square bg-primary rounded-circle d-flex align-items-center justify-content-center">
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
        {{-- <div class="row g-0 mx-lg-0"> --}}
            <div class="col-lg-12 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px; display: flex; justify-content: center; align-items: center;">
                {{-- <div class="position-relative h-100" style=""> --}}
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/bGO3sTlNusk?si=POUc9ZqEgMck6HBQ" allow="autoplay; encrypted-media" frameborder="0" allowfullscreen autoplay loop muted>
                    </iframe>
                {{-- </div> --}}
            </div>
            {{-- <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary">About</h6>
                    <h1 class="mb-4"> Sistem Informasi KBK (Kelompok Bidang Keahlian)</h1>
                    <p>Sistem Informasi KBK (Kelompok Bidang Keahlian) adalah platform terintegrasi yang dirancang khusus untuk mendukung manajemen perkuliahan dan pengelolaan data yang terkait dengan kelompok bidang keahlian dosen. Sistem ini memfasilitasi berbagai fungsi penting dalam lingkup pendidikan, termasuk pengaturan RPS (Rencana Pembelajaran Semester), manajemen data mata kuliah dan dosen KBK, serta pengelolaan soal UAS (Ujian Akhir Semester).</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Pengelolaan RPS yang Efisien</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Manajemen Data Matkul dan Dosen KBK</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Integrasi Data dan Pelaporan</p>
                    <p><i class="fa fa-check-circle text-primary me-3"></i>Pemantauan Kinerja dan Evaluasi Berkelanjutan</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Explore More</a>
                </div>
            </div> --}}
        {{-- </div> --}}
    </div>
</div>
<!-- About End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-4">Pengurus KBK</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/deni-satria1.jpg">
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <h5 class="mb-1">Deni Satria, M.Kom</h5>
                    <h5 class="mb-1">Ketua</h5>
                    <span class="fst-italic">Center of Programming </span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/yulherniwati.jpg">
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <h5 class="mb-1">Yulherniwati, S.Kom., MT</h5>
                    <h5 class="mb-1">Ketua</h5>
                    <span class="fst-italic">Center of Software
                        Technology and Management </span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/alde-alanda.jpg">
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <h5 class="mb-1">Alde Alanda, S.Kom., M.T</h5>
                    <h5 class="mb-1">Ketua</h5>
                    <span class="fst-italic">Center of Network, Security,
                        and Infrastructure 
                        </span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/meriazmi.jpg">
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <h5 class="mb-1">Meri Azmi, ST.,M.Cs </h5>
                    <h5 class="mb-1">Ketua</h5>
                    <span class="fst-italic">Center of Artifcial Intelligence
                        </span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/Hendra-Rotama.jpg">
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <h5 class="mb-1">Hendra Rotama S.pd., M.Sn </h5>
                    <h5 class="mb-1">Ketua</h5>
                    <span class="fst-italic">Center of Desain, Animation
                        and Multimedia 
                        </span>
                </div>
            </div>

            {{-- <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-2.jpg">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Client Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-3.jpg">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Client Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection