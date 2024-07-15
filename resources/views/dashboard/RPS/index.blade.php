@extends('dashboard.layouts.app')

@section('title', 'Data RPS')

@section('scriptpages')
    @include('dashboard.RPS.scripts')
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data RPS</h3>
                        <div class="card-header-form">
                            @can('dosen-pengampu')
                                {{-- tambah --}}
                                <button class="btn btn-success ml-2 action" type="button" data-toggle="tooltip" id="modalAdd"
                                    title="Tambah Data"><i class="fas fa-plus"></i></button>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <div class="alert alert-success d-none" id="success-alert"></div>
                            <table class="table table-striped table-bordered display" id="dataTable">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light">Kode RPS</th>
                                        <th class="text-light">Dosen Pengembang</th>
                                        <th class="text-light">Matkul</th>
                                        <th class="text-light">Dokumen</th>
                                        <th class="text-light">Tanggal</th>
                                        <th class="text-light text-nowrap">Tahun Akademik</th>
                                        @can('dosen-pengampu')
                                            <th class="text-light">Status</th>
                                            <th class="text-light">Action</th>
                                        @endcan
                                        @can('pengurus-kbk')
                                            <th class="text-light">Status</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rps as $data)
                                        <tr id="data{{ $data->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->KodeRPS }}</td>
                                            <td class="text-nowrap">{{ $data->dosen->nama }}</td>
                                            <td class="text-nowrap">{{ $data->kode_matkul->nama_matakuliah }}</td>
                                            <td>
                                                @if ($data->Dokumen)
                                                    <a class="btn btn-primary" href="{{ asset('storage/dokumen/' . $data->Dokumen) }}"
                                                        target="_blank">Lihat Dokumen</a>
                                                @else
                                                    Tidak ada dokumen
                                                @endif
                                            </td>
                                            <td class="text-nowrap">{{ $data->Tanggal }}</td>
                                            <td>{{ $data->thnakd->smt_thn_akd }}</td>
                                            @can('dosen-pengampu')
                                                <td>
                                                    <span id="status_{{ $data->id }}" class="badge rounded-pill {{ $data->status == 'terverifikasi' ? 'bg-success text-light' : 'bg-warning text-dark' }}">
                                                        {{ $data->status == 'terverifikasi' ? 'Terverifikasi' : 'Menunggu...' }}
                                                    </span>
                                                </td>
                                                <td class="d-flex justify-content-around">
                                                    <button class="btn btn-icon btn-warning editBtn" data-id="{{ $data->id }}">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-info detailBtn" data-id="{{ $data->id }}">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                    <button class="btn btn-danger deleteBtn" data-toggle="modal" data-id="{{ $data->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            @endcan
                                            @can('pengurus-kbk')
                                                <td class="d-flex justify-content-around">
                                                    {!! $data->status != 'terverifikasi'
                                                        ? '<button class="btn btn-icon btn-success approve" data-id="' . $data->id .
                                                            '"><i class="fas fa-check"></i></button> <span id="status_' . $data->id .
                                                            '" class="badge rounded-pill bg-success text-light d-none">Terverifikasi</span>'
                                                        : '<span id="status_' . $data->id . '" class="badge rounded-pill bg-success text-light">Terverifikasi</span>' !!}
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
                    <h5 class="modal-title">Anda yakin ingin menghapus data?</h5>
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

    @include('dashboard.RPS.addModal')
    @include('dashboard.RPS.editModal')
    @include('dashboard.RPS.detailModal')
@endsection
