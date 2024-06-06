@extends('dashboard.layouts.app')

@section('title','Data Matakuliah')

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
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                                        <th class="text-nowrap">Kode MataKuliah</th>
                                        <th>TP</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Kurikulum</th>
                                        <th>Action</th>
                                    </tr>
                                        {{-- <th>Jam</th>
                                        <th>SKS_Praktek</th>
                                        <th>SKS_Teori</th>
                                        <th>Jam_Teori</th>
                                        <th>Jam_Praktek</th> --}}
                                </thead>
                                <tbody>
                                        @foreach ( $data_damat as $item)
                                    <tr>
                                        <td>{{ $data_damat->firstItem()+$loop->index }}</td>
                                        <td>{{ $item->kode_matakuliah}}</td>
                                        <td>{{ $item->nama_matakuliah}}</td>
                                        <td>{{ $item->TP }}</td>
                                        <td>{{ $item->sks }}</td>
                                        <td>{{ $item->jam }}</td>
                                        <td>{{ $item->sks_teori }}</td>
                                        <td>{{ $item->sks_praktek }}</td>
                                        <td>{{ $item->jam_teori }}</td>
                                        <td>{{ $item->jam_praktek }}</td>
                                        <td>{{ $item->semester }}</td>
                                        <td>{{ $item->kurikulum->id_kurikulum }}</td>
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
