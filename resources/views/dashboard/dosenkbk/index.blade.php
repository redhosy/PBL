@extends('dashboard.layouts.app')

@section('title', 'Dosen KBK')

@section('scriptpages')
    @include('dashboard.dosenkbk.scripts')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Dosen KBK</h3>
                        <div class="card-header-form">           
                            {{-- import --}}
                            <a class="btn btn-primary ml-2  action" type="button" data-toggle="tooltip"
                                id="import" title="Import Data"><i class="fas fa-file-import" data-toggle="modal"
                                data-target="#importModal"></i></a>
                            {{-- export --}}
                            <a href="{{ route('dosenkbk.export.excel') }}" class="btn btn-secondary ml-2  action" type="button" data-toggle="tooltip"
                                id="export" title="Export Data"><i class="fas fa-file-export"></i></a>
                            {{-- tambah --}}
                            <button class="btn btn-success ml-2  action" type="button" data-toggle="tooltip"
                                id="modalAdd" title="Tambah Data"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light">Nama</th>
                                        <th class="text-light">Nip</th>
                                        {{-- <th class="text-light">Jurusan</th> --}}
                                        <th class="text-light">Prodi</th>
                                        <th class="text-light">Email</th>
                                        <th class="text-light">KBK</th>
                                        <th class="text-light">Jabatan</th>
                                        <th class="text-light">Status</th>
                                        <th class="text-light">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dosenkbk as $data)
                                        <tr id="data{{ $data->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-nowrap">  {{ $data->dosen->nama   }}</td>
                                            <td class="text-nowrap">  {{ $data->dosen->nip }}</td>
                                            {{-- <td class="text-nowrap">{{ $data->jurusan->jurusan }}</td> --}}
                                            <td class="text-nowrap">{{ $data->prodi->prodi }}</td>
                                            <td class="text-nowrap">  {{ $data->dosen->email  }}</td>
                                            <td>{{ $data->kbk->kodekbk }}</td>
                                            <td>{{ $data->jabatan->jabatan_pimpinan }}</td>
                                            <td>
                                                <span class="badge rounded-pill {{ $data->status ? 'bg-success  text-white' : 'bg-danger text-white' }} py-2 px-4">
                                                    {{ $data->status == 1 ? 'Aktif' : 'Nonaktif'}}
                                                </span> 
                                            </td>
                                            <td class="d-flex justify-content-around">
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

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form id="importForm" action="{{ route('dosenkbk.import.excel') }}" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header">
                     <h5 class="modal-title" id="importModalLabel">Import Data Excel</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="file">Pilih file Excel:</label>
                         <input type="file" class="form-control" id="file" name="file" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Import</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 @include('dashboard.dosenkbk.addModal')
 @include('dashboard.dosenkbk.editModal')
 @include('dashboard.dosenkbk.detailModal')
@endsection
