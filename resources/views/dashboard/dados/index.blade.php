@extends('dashboard.layouts.app')

@section('title', 'Data Dosen')

@section('scriptpages')
    @include('dashboard.dados.scripts')
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Dosen</h3>
                        <div class="card-header-form">
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary text-center" style="text-align: center">
                                    <tr class="auto-width">
                                        <th class="text-light">No</th>
                                        <th class="text-light">NIP</th>
                                        <th class="text-light">Nama</th>
                                        <th class="text-light">Email</th>
                                        {{-- <th class="text-light">NIDN</th> --}}
                                        <th class="text-light">Gender</th>
                                        {{-- <th class="text-light">Jurusan</th> --}}
                                        <th class="text-light">Prodi</th>
                                        <th class="text-light">Status</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    @foreach ($data_dos as $item)
                                        <tr id="data{{ $item->id }}" style="font-size: 13px" class="auto-width">

                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-nowrap">{{ $item->nip }}</td>
                                            <td class="text-nowrap">{{ $item->nama }}</td>
                                            <td class="text-nowrap">{{ $item->email }}</td>
                                            {{-- <td class="text-nowrap">{{ $item->nidn }}</td> --}}
                                            <td class="text-nowrap">{{ $item->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}
                                            </td>
                                            {{-- <td class="text-nowrap">{{ $item->jurusan->jurusan ?? '~' }}</td> --}}
                                            <td class="text-nowrap">{{ $item->prodi->prodi }}</td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill {{ $item->status ? 'bg-success text-white' : 'bg-danger text-white' }} py-2 px-4">
                                                    {{ $item->status ? 'Aktif' : ' Tidak Aktif ' }}
                                                </span>
                                            </td>
                                            <td class="d-flex justify-content-around">
                                                {{-- <button class="btn btn-icon btn-warning editBtn mr-2"
                                                    data-id="{{ $item->id }}"><i class="far fa-edit"></i></button> --}}
                                                <button class="btn btn-icon btn-info detailBtn mr-2"
                                                    data-id="{{ $item->id }}"><i
                                                        class="fas fa-info-circle"></i></button>
                                                {{-- <button class="btn btn-danger deleteBtn" data-toggle="modal"
                                                    data-id="{{ $item->id }}"><i class="fas fa-trash"></i></button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $data_dos->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="modalDelete">
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
    </div> --}}
    @include('dashboard.dados.detailModal')
@endsection
{{-- @include('dashboard.dados.addModal')
@include('dashboard.dados.editModal') --}}
