@extends('dashboard.layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-1">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center mt-3">
                        <h3>Data Program Studi</h3>
                        <div class="card-header-form mt-5">
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
                                        <th>Kode MataKuliah</th>
                                        <th>TP</th>
                                        <th>SKS</th>
                                        <th>Jam</th>
                                        <th>SKS_Praktek</th>
                                        <th>SKS_Teori</th>
                                        <th>Jam_Teori</th>
                                        <th>Jam_Praktek</th>
                                        <th>Semester</th>
                                        <th>Kurikulum</th>
                                        <th>Action</th>
                                    </tr>
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
