@extends('dashboard.layouts.app')

@section('title', 'Data KBK')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Matkul KBK</h3>
                        <div class="card-header-form">
                            {{-- pencarian --}}
                            <div class="input-group">
                                <input type="text" id="searchInput" class="form-control"
                                    placeholder="Cari KodeMatkul atau NamaMatkul...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary mr-2" id="searchButton"><i
                                            class="fas fa-search"></i></button>
                                </div>
                                {{-- print --}}
                                {{-- <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                </a> --}}
                                {{-- tambah --}}
                                <button class="btn btn-success" type="button" data-toggle="modal" id="modalAdd"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <div class="alert alert-success d-none" id="success-alert">
                                Berhasil
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Matkul</th>
                                        <th>Nama Matkul</th>
                                        <th>Jumlah SKS</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    @foreach ($matkulkbk as $data)
                                        <tr id="data{{ $data->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->KodeMatkul }}</td>
                                            <td>{{ $data->Nama }}</td>
                                            <td>{{ $data->Jumlahsks }}</td>
                                            <td>
                                                <button class="btn btn-icon btn-warning editBtn" data-id="{{ $data->id }}"><i
                                                        class="far fa-edit"></i></button>
                                                <button class="btn btn-icon btn-info detailBtn" data-id="{{ $data->id }}"><i
                                                        class="fas fa-info-circle"></i></button>
                                                <button class="btn btn-danger deleteBtn" data-toggle="modal" data-id="{{ $data->id }}" ><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
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
        <div class="modal-dialog ">
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


    @include('dashboard.matkulkbk.addModal')
    @include('dashboard.matkulkbk.editModal')
    @include('dashboard.matkulkbk.detailModal')

    @include('dashboard.matkulkbk.scripts')
@endsection
