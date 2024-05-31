@extends('dashboard.layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-1">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center mt-3">
                        <h3>Data Kurikulum Program Studi</h3>
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
                                        <th>Kode Kurikulum</th>
                                        <th>Nama Kurikulum</th>
                                        <th>Tahun</th>
                                        <th>Prodi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ( $data_kur as $item)
                                    <tr>
                                        <td>{{ $data_kur->firstItem()+$loop->index }}</td>
                                        <td>{{ $item->kode_kurikulum}}</td>
                                        <td>{{ $item->nama_kurikulum}}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->prodi->prodi}}</td>
                                        <td>
                                            <span class="badge rounded-pill {{ $item->status ? 'bg-success  text-white' : 'bg-danger text-white' }} py-2 px-4">
                                                {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>     
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data_kur->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
