@extends('dashboard.layouts.app')

@section('title', 'Data Pengguna')

@section('scriptpages')
    @include('dashboard.pengguna.scripts')
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Pengguna</h3>
                        <div class="card-header-form">
                            <button class="btn btn-success ml-2 action" type="button" data-toggle="tooltip" id="modalAdd" title="Tambah Data"><i
                                class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light">Nama</th>
                                        <th class="text-light">Email</th>
                                        <th class="text-light">Peran</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataPengguna">
                                    @foreach ($data_user as $item)
                                        <tr id="data{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td class="d-flex justify-content-around">
                                                <button class="btn btn-icon btn-warning editBtn"
                                                    data-id="{{ $item->id }}"><i class="far fa-edit"></i></button>
                                                <button class="btn btn-icon btn-info detailBtn"
                                                    data-id="{{ $item->id }}"><i
                                                        class="fas fa-info-circle"></i></button>
                                                <button class="btn btn-danger deleteBtn" data-toggle="modal"
                                                    data-id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
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
    @include('dashboard.pengguna.detailModal')
    @include('dashboard.pengguna.addModal')
    @include('dashboard.pengguna.editModal')
@endsection
