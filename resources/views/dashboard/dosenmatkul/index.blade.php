@extends('dashboard.layouts.app')

@section('title', 'Dosen Matakuliah')

@section('scriptpages')
    @include('dashboard.dosenmatkul.scripts')
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
                    <h3>Dosen Matakuliah</h3>
                    <div class="card-header-form">
                    </div>
                </div>
                <div class="card-body p-3 rounded">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" class="display">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-light">No</th>
                                    <th class="text-light text-nowrap">Nama</th>
                                    <th class="text-light">Matakuliah</th>
                                    <th class="text-light">Kelas</th>
                                    <th class="text-light">Semester</th>
                                    <th class="text-light">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dosenmatkul as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-nowrap">{{ $item->dosen->nama }}</td>
                                        <td>{{ $item->matakuliah->nama_matakuliah}}</td>
                                        <td>{{ $item->kelas->nama_kelas }}</td>
                                        <td>{{ $item->semester->smt_thn_akd }}</td>
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
@include('dashboard.dosenmatkul.detailModal')
@endsection
