    @extends('dashboard.layouts.app')

    @section('title', 'Dashboard')

    @section('content')
        <!-- Main Content -->
        <div class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            @canany(['pengurus-kbk', 'pimpinan-jurusan' ,'pimpinan-prodi'])
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengunggah RPS</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\RPS::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Verifikasi RPS</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\verifikasi_rps::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengunggah Soal UAS</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\soalUas::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Verifikasi Soal UAS</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\verifikasi_soal::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Laporan RPS</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\BeritaAcaraRPS::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Laporan SoalUAS</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\BeritaAcaraSoal::count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcanany

            @canany(['admin'])
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Matakuliah KBK</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\ref_matakuliahkbk::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Dosen KBK</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\ref_dosenkbk::count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data KBK</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\ref_datakbk::count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcanany

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pie Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/modules-chartjs.js') }}"></script>
@endpush
