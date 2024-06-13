@extends('dashboard.layouts.app')

@section('title','Data Dosen')

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
                            <form>
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="button" id="searchButton" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="auto-width">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIDN</th>
                                        <th>NIP</th>
                                        <th>gender</th>
                                        <th>Jurusan</th>
                                        <th>Prodi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="datatable">
                                    @foreach ($data_dos as $item)
                                        <tr id="data{{ $item->id }}" style="font-size: 13px" class="auto-width">
                                            
                                            <td>{{ $data_dos->firstItem()+$loop->index }}</td>
                                            <td class="text-nowrap">{{ $item->nama }}</td>
                                            <td class="text-nowrap">{{ $item->nidn }}</td>
                                            <td class="text-nowrap">{{ $item->nip }}</td>
                                            <td class="text-nowrap">{{ $item->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                            <td class="text-nowrap">{{ $item->jurusan->jurusan ?? '~' }}</td>
                                            <td class="text-nowrap">{{ $item->prodi?->prodi }}</td>
                                            {{-- <td>{{ $item->image }}</td>  --}}
                                            <td>
                                                <span class="badge rounded-pill {{ $item->status ? 'bg-danger text-white' : 'bg-success text-white' }} py-2 px-4">
                                                    {{ $item->status ? 'Tidak Aktif' : ' Aktif' }}
                                                </span>                                    
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-info detailBtn" data-id="{{ $item->id }}"><i
                                                    class="fas fa-info-circle"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data_dos->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('dashboard.dados.detailModal')
