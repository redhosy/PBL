@extends('dashboard.layouts.app')

@section('title', 'Data Jurusan')

@section('scriptpages')
    @include('dashboard.dajur.scripts')
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Jurusan</h3>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary" id="searchButton"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    {{-- tambah --}}
                                    <button class="btn btn-success ml-2" type="button" data-toggle="modal" id="modalAdd"><i
                                            class="fas fa-plus"></i></button>
                                </div>
                            </form>
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
                                        <th>Kode Jurusan</th>
                                        <th>Nama Jurusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="datatable">
                                    @foreach ($data_jur as $item)
                                        <tr id="data{{ $item->id }}">
                                            <td>{{ $data_jur->firstItem() + $loop->index }}</td>
                                            <td>{{ $item->kode_jurusan }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>
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
                            {{ $data_jur->links() }}
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
@endsection
@include('dashboard.dajur.detailModal')
@include('dashboard.dajur.addModal')
@include('dashboard.dajur.editModal')
