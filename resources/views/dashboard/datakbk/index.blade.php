@extends('dashboard.layouts.app')

@section('title', 'Data KBK')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-end d-flex bg-secondary">
            <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i
                    class="fas fa-download fa-sm text-white-50"></i> Print</a>
            <a href="/dashboard/datakbk/create" class="d-flex d-sm-inline-block btn btn-sm btn-success shadow-sm "><i
                    class="fas fa-plus fa-sm text-white-50"></i> Add</a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <label class="d-flex align-items-center justify-content-end">
                                    <p class="mb-0 mr-2">Search:</p>
                                    <form action="/dapro" method="GET">
                                        <input type="search" name="cari" class="col-lg-4 form-control form-control-sm"
                                            placeholder="" aria-controls="dataTable">
                                    </form>
                                </label>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama KBK</th>
                            <th>Kode KBK</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data_datakbk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->namakbk}}</td>
                            <td>{{ $item->kodekbk}}</td>
                            <td>{{ $item->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
