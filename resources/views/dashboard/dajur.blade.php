@extends('dashboard.layouts.app')

@section('title','Data Jurusan')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jurusan</h6>
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
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td>#</td>
                            <td># </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection