@extends('dashboard.layouts.app')

@section('title', 'Data verifikasi Soal')

@section('scriptpages')
    @include('dashboard.verifikasiSoal.scripts')
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Tabel Berita Acara RPS -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Berita Acara Soal UAS</h3>
                        <div class="d-flex justify-content-around align-items-center">
                            <form action="/cetakSOAL" method="get" target="_blank">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <!-- Filter -->
                                    <select class="form-control selectpicker w-auto mr-2" id="filterTanggal" name="tanggal">
                                        <option value="">Pilih Tanggal</option>
                                        @foreach ($tanggalList as $tanggal)
                                            <option value="{{ $tanggal->tanggal }}">{{ $tanggal->tanggal }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Print -->
                                    <button class="btn btn-primary" type="submit" data-toggle="tooltip"
                                        title="Cetak Berita Acara">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </form>
                            @can('pengurus-kbk')
                            <div class="form-group mb-0">
                                <!-- Add -->
                                <button class="btn btn-success ml-2" type="button" data-toggle="tooltip" id="modalAdd"
                                    title="Tambah Data">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            @endcan
                        </div>

                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable1">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light">Semester</th>
                                        <th class="text-light">Matkul</th>
                                        <th class="text-light">Validasi Isi</th>
                                        <th class="text-light">Tanggal</th>
                                        <th class="text-light">Ruang</th>
                                        @can('pengurus-kbk')
                                        <th class="text-light">Actions</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody id="dataTableBody">
                                        @foreach ($beritaSoal as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->semester }}</td>
                                                <td>{{ $item->matkul->nama_matakuliah }}</td>
                                                <td>{{ $item->validasi_isi }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->ruang }}</td>
                                                @can('pengurus-kbk')
                                                <td class="d-flex justify-content-around">
                                                    <button class="btn btn-warning editBtn" data-toggle="modal"
                                                        data-target="#editModal" data-id="{{ $item->id }}"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger deleteBtn" data-toggle="modal"
                                                        data-target="#deleteModal" data-id="{{ $item->id }}"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Anda yakin Ingin Menghapus Data?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-footer mt-5">
                    <form action="" id="formDelete" method="POST">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="button" id="confirmDelete">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.verifikasiSoal.addModal')
    @include('dashboard.verifikasiSoal.editModal')
    {{-- @include('dashboard.verifikasiRPS.detailModal')  --}}
@endsection
