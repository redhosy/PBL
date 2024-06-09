@extends('dashboard.layouts.app')

@section('title','Data Matakuliah')

@section('scriptpages')
@include('dashboard.matkul.scripts')
@endsection


@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="section-header">
                    @section('title','Matakuliah')
                  </div>
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Matakuliah</h3>
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
                                    <tr>
                                        <th>No</th>
                                        {{-- <th class="text-nowrap">Kode MataKuliah</th> --}}
                                        <th>Nama Matkul</th>
                                        <th>TP</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Kurikulum</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ( $data_damat as $item)
                                    <tr>
                                        <td>{{ $data_damat->firstItem()+$loop->index }}</td>
                                        {{-- <td>{{ $item->kode_matakuliah}}</td> --}}
                                        <td class="text-nowrap">{{ $item->nama_matakuliah}}</td>
                                        <td>{{ $item->TP }}</td>
                                        <td>{{ $item->sks }}</td>
                                        {{-- <td>{{ $item->jam }}</td> --}}
                                        {{-- <td>{{ $item->sks_teori }}</td> --}}
                                        {{-- <td>{{ $item->sks_praktek }}</td> --}}
                                        {{-- <td>{{ $item->jam_teori }}</td>
                                        <td>{{ $item->jam_praktek }}</td> --}}
                                        <td>{{ $item->semester }}</td>
                                        <td class="text-nowrap">{{ $item->kurikulum->nama_kurikulum }}</td>
                                        <td>
                                            <button class="btn btn-icon btn-info detailBtn" data-id="{{ $item->id }}"><i
                                                class="fas fa-info-circle"></i></button>
                                         </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data_damat->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('dashboard.matkul.detailModal')
