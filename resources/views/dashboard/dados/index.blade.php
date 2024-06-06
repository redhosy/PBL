@extends('dashboard.layouts.app')

@section('title','Data Dosen')

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
                                    <tr class="auto-width">
                                        <th>No</th>
                                        <th>Nama</th>
                                        {{-- <th>NIDN</th> --}}
                                        <th>NIP</th>
                                        {{-- <th>Gender</th> --}}
                                        <th>Jurusan</th>
                                        <th>Prodi</th>
                                        {{-- <th>Email</th> --}}
                                        {{-- <th>Image</th> --}}
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_dos as $item)
                                        <tr style="font-size: 13px" class="auto-width">
                                            
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-nowrap">{{ $item->nama }}</td>
                                            {{-- <td>{{ $item->nidn }}</td> --}}
                                            <td class="text-nowrap">{{ $item->nip }}</td>
                                            {{-- <td>{{ $item->gender }}</td> --}}
                                            <td class="text-nowrap">{{ $item->jurusan->jurusan }}</td>
                                            <td class="text-nowrap">{{ $item->prodi?->prodi }}</td>
                                            {{-- <td>{{ $item->email }}</td>
                                            <td>{{ $item->image }}</td> --}}
                                            <td>
                                                <span class="badge rounded-pill {{ $item->status ? 'bg-danger text-white' : 'bg-success text-white' }} py-2 px-4">
                                                    {{ $item->status ? 'Tidak Aktif' : ' Aktif' }}
                                                </span>                                    
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
