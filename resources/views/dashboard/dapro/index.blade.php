@extends('dashboard.layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-1">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center mt-5">
                        <h3>Data Program Studi</h3>
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
                                        <th>Kode Prodi</th>
                                        <th>Nama Prodi</th>
                                        <th>Jurusan</th>
                                        <th>Jenjang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pro as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_prodi }}</td>
                                            <td>{{ $item->prodi }}</td>
                                            <td>{{ $item->jurusan->jurusan }}</td>
                                            <td>{{ $item->id_jenjang }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data_pro->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
