@extends('dashboard.layouts.app')

@section('title', 'Data RPS')

@section('scriptpages')
    @include('dashboard.rps.scripts')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="section-header">
                    @section('title', 'RPS')
                </div>
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data RPS</h3>
                        <div class="card-header-form">
                        </div>
                    </div>
                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" class="display">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-light">No</th>
                                        <th class="text-light">Semester</th>
                                        <th class="text-light">Tahun Akademik</th>
                                        <th class="text-light text-nowrap">Matakuliah</th>
                                        <th class="text-light">Status Verifikasi</th>
                                        <th class="text-light">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($rps as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->semester }}</td>
                                            <td>{{ $item->tahun_akademik }}</td>
                                            <td class="text-nowrap">{{ $item->matakuliah }}</td>
                                            <td>{{ $item->status_verifikasi }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('kaprodi.rps.detail', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                            {{-- {{ $rps->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.kaprodi.detailModal')
@endsection
