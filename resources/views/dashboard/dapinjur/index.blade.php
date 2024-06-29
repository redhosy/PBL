@extends('dashboard.layouts.app')

@section('title', 'Data Pimpinan Jurusan')

@section('scriptpages')
    @include('dashboard.dapinjur.scripts')
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Pimpinan Jurusan</h3>
                        <div class="card-header-form">
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <div class="alert alert-success d-none" id="success-alert">
                                Berhasil
                            </div>
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-nowrap text-light">Jabatan Pimpinan</th>
                                        <th class="text-light">Nama</th>
                                        <th class="text-light">Jurusan</th>
                                        <th class="text-light">Periode</th>
                                        <th class="text-light">Status</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pim as $item)
                                        <tr id="data{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-nowrap">{{ $item->jabpim->jabatan_pimpinan }}</td>
                                            <td class="text-nowrap">{{ $item->dosen->nama }}</td>
                                            <td class="text-nowrap">{{ $item->jurusan->jurusan }}</td>
                                            <td class="text-nowrap">{{ $item->periode }}</td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill {{ $item->status ? 'bg-success  text-white' : 'bg-danger text-white' }} py-2 px-4">
                                                    {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    {{-- <button class="btn btn-icon btn-warning editBtn ml-2" data-id="{{ $item->id }}"><i class="far fa-edit"></i></button> --}}
                                                    <button class="btn btn-icon btn-info detailBtn ml-2" data-id="{{ $item->id }}"><i class="fas fa-info-circle"></i></button>
                                                    {{-- <button class="btn btn-danger deleteBtn ml-2" data-toggle="modal" data-id="{{ $item->id }}"><i class="fas fa-trash"></i></button> --}}
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $data_pim->links() }} --}}
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
    @include('dashboard.dapinjur.detailModal')
@endsection
{{-- @include('dashboard.dapinjur.addModal')
@include('dashboard.dapinjur.editModal') --}}
