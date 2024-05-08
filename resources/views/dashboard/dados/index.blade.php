@extends('dashboard.layouts.app')

@section('title', 'Data Dosen')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-end d-flex bg-secondary">
            <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
                    class="fas fa-download fa-sm text-white-50"></i> Print</a>
            <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   
                    <thead>
                        <tr class="auto-width">
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIDN</th>
                            <th>NIP</th>
                            <th>Gender</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_dos as $item)
                            <tr style="font-size: 13px" class="auto-width">
                                
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nidn }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->jurusan->jurusan }}</td>
                                <td>{{ $item->prodi?->prodi }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->image }}</td>
                                <td>
                                    <a  class="btn btn-sm btn-{{ $item->status ? 'danger' : 'success'}}">
                                    {{ $item->status ? 'NonAktif':'Aktif'}}
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data_dos->links() }} 
                {{-- @if ($isEmpty)
                    <div class="alert alert-warning" role="alert">
                        Data tidak ditemukan.
                    </div>
                @endif --}}

            </div>
        </div>
    </div>
@endsection
