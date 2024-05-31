@extends('dashboard.layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-1">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center mt-5">
                        <h3>Data Pimpinan Jurusan</h3>
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
                                        <th>Jabatan Pimpinan</th>
                                        <th>Jurusan</th>
                                        <th>Dosen</th>
                                        <th>Priode</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ( $data_pim as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->jabpim->jabatan_pimpinan}}</td>
                                        <td>{{ $item->jurusan->jurusan}}</td>
                                        <td>{{ $item->dosen->nama }}</td>
                                        <td>{{ $item->periode }}</td>
                                        <td>
                                            <span class="badge rounded-pill {{ $item->status ? 'bg-success  text-white' : 'bg-danger text-white' }} py-2 px-4">
                                                {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>   
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data_pim->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
