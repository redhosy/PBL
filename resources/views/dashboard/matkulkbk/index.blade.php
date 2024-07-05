@extends('dashboard.layouts.app')

@section('title', 'Matkul KBK')

@section('scriptpages')
    @include('dashboard.matkulkbk.scripts')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 offset-md-0">
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Matkul KBK</h3>
                    <div class="card-header-form">
                        {{-- import --}}
                        <a class="btn btn-secondary ml-2  action" type="button" data-toggle="tooltip"
                            id="import" title="Import Data"><i class="fas fa-file-import" data-toggle="modal"
                            data-target="#importModal"></i></a>
                        {{-- export --}}
                        <a href="{{ route('matkulkbk.export.excel') }}" class="btn btn-info ml-2  action" type="button" data-toggle="tooltip"
                            id="export" title="Export Data"><i class="fas fa-file-export"></i></a>
                        {{-- tambah --}}
                        <a class="btn btn-success ml-2  action" type="button" data-toggle="tooltip"
                            id="modalAdd" title="Tambah Data"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body p-3 rounded">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" class="display">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-light">No</th>
                                    {{-- <th class="text-light">Kode Matkul</th> --}}
                                    <th class="text-light">Nama Matkul</th>
                                    <th class="text-light">Semester</th>
                                    <th class="text-light">T/P</th>
                                    <th class="text-light">KBK</th>
                                    <th class="text-light">Prodi</th>
                                    <th class="text-light">Jumlah SKS</th>
                                    <th class="text-light">Pengampu Matakuliah</th>
                                    <th class="text-light">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matkulkbk as $data)
                                    <tr id="data{{ $data->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $data->kode_matkul }}</td> --}}
                                        <td>{{ $data->nama_matkul }}</td>
                                        <td>{{ $data->semester }}</td>
                                        <td>{{ $data->ket}}</td>
                                        <td>{{ $data->kbk->kodekbk }}</td>
                                        <td>{{ $data->prodi->prodi }}</td>
                                        <td>{{ $data->jumlah_sks }}</td>
                                        <td>{{ $data->dosen->nama }}</td>
                                        <td class="d-flex justify-content-around">
                                            <button class="btn btn-icon btn-warning editBtn"
                                                data-id="{{ $data->id }}"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-icon btn-info detailBtn"
                                                data-id="{{ $data->id }}"><i
                                                    class="fas fa-info-circle"></i></button>
                                            <button class="btn btn-danger deleteBtn" data-toggle="modal"
                                                data-id="{{ $data->id }}"><i class="fas fa-trash"></i></button>
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

  {{-- modal delete --}}
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
{{-- end modal delete --}}

 <!-- Import Modal -->
 <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <form id="importForm" action="{{ route('matkulkbk.import.excel') }}" method="POST"
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
<!-- End Import Modal -->
@include('dashboard.matkulkbk.addModal')
@include('dashboard.matkulkbk.editModal')
@include('dashboard.matkulkbk.detailModal')
@endsection

