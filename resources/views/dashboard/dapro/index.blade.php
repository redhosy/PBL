@extends('dashboard.layouts.app')

@section('title','Data Program Studi')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-end d-flex bg-dark">
            <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
                class="fas fa-download fa-sm text-white-50"></i> Print</a>
            <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label class="d-flex align-items-center justify-content-start"><p class="mb-0 mr-2">Show</p>
                                <select name="dataTable_length" aria-controls="dataTable" class="col-lg-2 custom-select custom-select-sm  form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select><p class="mb-0 ml-2">entries</p>
                            </label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <label class="d-flex align-items-center justify-content-end"><p class="mb-0 mr-2">Search:</p>
                                    <input type="search" class="col-lg-4 form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                </label>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Prodi</th>
                            <th>Nama Prodi</th>
                            <th>ID Jurusan</th>
                            <th>ID Jenjang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                            @foreach ( $data_pro as $item)
                        @php
                            $no++;
                        @endphp
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item['kode_prodi']}}</td>
                            <td>{{ $item['prodi'] }}</td>
                            <td>{{ $item['id_jurusan'] }}</td>
                            <td>{{ $item['id_jenjang'] }}</td>
                            <td><a href="#" class="btn btn-sm btn-warning d-sm-inline-block"><i class="fas fa-pen"></i> edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection