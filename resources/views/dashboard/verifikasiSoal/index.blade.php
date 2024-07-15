@extends('dashboard.layouts.app')

@section('title', 'Data Soal UAS')

@section('scriptpages')
    @include('dashboard.verifikasiSoal.scripts')
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Verifikasi Soal UAS</h3>
                        <div class="card-header-form">
                            @can('pengurus-kbk')
                            {{-- tambah --}}
                            <button class="btn btn-success ml-2 action" type="button" data-toggle="tooltip"
                                id="modalAdd" title="Tambah Data"><i class="fas fa-plus"></i></button>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light text-nowrap">Kode Soal</th>
                                        <th class="text-light">Dosen Pengampu</th>
                                        <th class="text-light">Matkul</th>
                                        <th class="text-light">Dokumen Verifikasi</th>
                                        <th class="text-light">Tanggal</th>
                                        <th class="text-light">Tahun Akademik</th>
                                        @can('pengurus-kbk')
                                        <th class="text-light">Actions</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soal as $data)
                                        <tr id="data{{ $data->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->kodeSoal }}</td>
                                            <td class="text-nowrap">{{ $data->dosen->nama }}</td>
                                            <td class="text-nowrap">{{ $data->kode_matkul->nama_matakuliah }}</td>
                                            <td>
                                                @if ($data->document)
                                                <a class="btn btn-primary" href="{{ asset('storage/dokumentVerifikasiHasilSoal/' . $data->document) }}" target="_blank">Lihat
                                                    Dokumen</a>
                                                @else
                                                    Tidak ada dokumen
                                                @endif
                                            </td>
                                            <td class="text-nowrap">{{ $data->tanggal }}</td>
                                            <td class="text-nowrap">{{ $data->thnakd->smt_thn_akd }}</td>
                                            @can('pengurus-kbk')
                                            <td class="d-flex justify-content-around">
                                                <button class="btn btn-icon btn-warning editBtn" data-id="{{ $data->id }}"><i
                                                        class="far fa-edit"></i></button>
                                                {{-- <button class="btn btn-icon btn-info detailBtn" data-id="{{ $data->id }}"><i
                                                        class="fas fa-info-circle"></i></button> --}}
                                                <button class="btn btn-danger deleteBtn" data-toggle="modal" data-id="{{ $data->id }}" ><i
                                                        class="fas fa-trash"></i></button>
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
    {{-- @include('dashboard.verifikasiSoal.detailModal') --}}
@endsection
