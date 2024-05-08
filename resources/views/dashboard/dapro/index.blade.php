@extends('dashboard.layouts.app')

@section('title', 'Data Program Studi')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-end d-flex bg-secondary">
            <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
                    class="fas fa-download fa-sm text-white-50"></i> Print</a>
            <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-success shadow-sm "><i
                    class="fas fa-plus fa-sm text-white-50"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
@endsection
