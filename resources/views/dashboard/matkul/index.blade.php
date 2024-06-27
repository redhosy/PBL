@extends('dashboard.layouts.app')

@section('title', 'Data Matakuliah')

@section('scriptpages')
    @include('dashboard.matkul.scripts')
@endsection


@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="section-header">
                @section('title', 'Matakuliah')
            </div>
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Data Matakuliah</h3>
                    <div class="card-header-form">
                    </div>
                </div>
                <div class="card-body p-3 rounded">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" class="display">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-light">No</th>
                                    {{-- <th class="text-light">Kode MataKuliah</th> --}}
                                    <th class="text-light text-nowrap">Nama Matkul</th>
                                    <th class="text-light">TP</th>
                                    <th class="text-light">SKS</th>
                                    {{-- <th class="text-light">Jam</th> --}}
                                    <th class="text-light">Sks Teori</th>
                                    <th class="text-light">Sks Praktek</th>
                                    {{-- <th class="text-light">Jam Teori</th>
                                    <th class="text-light">Jam Praktek</th> --}}
                                    <th class="text-light">Semester</th>
                                    <th class="text-light">Kurikulum</th>
                                    <th class="text-light">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_damat as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $item->kode_matakuliah}}</td> --}}
                                        <td class="text-nowrap">{{ $item->nama_matakuliah }}</td>
                                        <td>{{ $item->TP }}</td>
                                        <td>{{ $item->sks }}</td>
                                        {{-- <td>{{ $item->jam }}</td> --}}
                                        <td>{{ $item->sks_teori }}</td>
                                        <td>{{ $item->sks_praktek }}</td>
                                        {{-- <td>{{ $item->jam_teori }}</td>
                                        <td>{{ $item->jam_praktek }}</td> --}}
                                        <td>{{ $item->semester }}</td>
                                        <td class="text-nowrap">{{ $item->kurikulum->nama_kurikulum }}</td>
                                        <td class="d-flex justify-content-around">
                                            <button type="button" class="btn btn-icon btn-info detailBtn"
                                                data-id="{{ $item->id }}"><i
                                                    class="fas fa-info-circle"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $data_damat->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.matkul.detailModal')
@endsection
