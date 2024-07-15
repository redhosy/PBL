@extends('dashboard.layouts.app')

@section('title', 'Data RPS')

@section('scriptpages')
    @include('dashboard.verifikasiRPS.scripts')
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data verifikasi RPS</h3>
                        <div class="card-header-form">
                            @can('pengurus-kbk')
                            {{-- tambah --}}
                            <button class="btn btn-success ml-2  action" type="button" data-toggle="tooltip" id="modalAdd"
                                title="Tambah Data"><i class="fas fa-plus"></i></button>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light">Kode RPS</th>
                                        <th class="text-light">Dosen Pengembang</th>
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
                                    @foreach ($rps as $data)
                                        <tr id="data{{ $data->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->KodeRPS }}</td>
                                            <td class="text-nowrap">{{ $data->dosen->nama }}</td>
                                            <td>{{ $data->kode_matkul->nama_matakuliah }}</td>
                                            <td>
                                                @if ($data->Dokumen)
                                                    <a class="btn btn-primary" href="{{ asset('storage/dokumenVerifikasiHasilRPS/' . $data->Dokumen) }}" target="_blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada dokumen
                                                @endif
                                            </td>
                                            <td class="text-nowrap">{{ $data->Tanggal }}</td>
                                            <td>{{ $data->thnakd->smt_thn_akd }}</td>
                                            @can('pengurus-kbk')
                                            <td class="d-flex justify-content-around">
                                                <button class="btn btn-icon btn-warning editBtn"
                                                    data-id="{{ $data->id }}"><i class="far fa-edit"></i></button>
                                                {{-- <button class="btn btn-icon btn-info detailBtn"
                                                    data-id="{{ $data->id }}"><i
                                                        class="fas fa-info-circle"></i></button> --}}
                                                <button class="btn btn-danger deleteBtn" data-toggle="modal"
                                                    data-id="{{ $data->id }}"><i class="fas fa-trash"></i></button>
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
    @include('dashboard.verifikasiRPS.addModal')
    @include('dashboard.verifikasiRPS.editModal')
    {{-- @include('dashboard.verifikasiRPS.detailModal') --}}
@endsection
