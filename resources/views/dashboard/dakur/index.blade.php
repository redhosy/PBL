@extends('dashboard.layouts.app')

@section('title','Data Kurikulum Prodi')

@section('scriptpages')
@include('dashboard.dakur.scripts')
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Kurikulum Program Studi</h3>
                        <div class="card-header-form">
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light">Nama Kurikulum</th>
                                        <th class="text-light">tahun</th>
                                        <th class="text-light">Prodi</th>
                                        <th class="text-light">Status</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                        @foreach ( $data_kur as $item)
                                    <tr id="data{{ $item->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kurikulum}}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->prodi->prodi}}</td>
                                        <td>
                                            <span class="badge rounded-pill {{ $item->status ? 'bg-success  text-white' : 'bg-danger text-white' }} py-2 px-4">
                                                {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>     
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <button class="btn btn-icon btn-info detailBtn" data-id="{{ $item->id }}"><i
                                                class="fas fa-info-circle"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $data_kur->links() }}  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.dakur.detailModal')
@endsection

