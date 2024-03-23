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
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label class="d-flex align-items-center justify-content-start">
                                    <p class="mb-0 mr-2">Show</p>
                                    <select name="dataTable_length" aria-controls="dataTable"
                                        class="col-lg-2 custom-select custom-select-sm  form-control form-control-sm">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                    <p class="mb-0 ml-2">entries</p>
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <label class="d-flex align-items-center justify-content-end">
                                    <p class="mb-0 mr-2">Search:</p>
                                    <form action="/dados" method="GET">
                                        <input type="search" name="cari" class="col-lg-4 form-control form-control-sm"
                                            placeholder="" aria-controls="dataTable">
                                    </form>
                                </label>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr class="auto-width">
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIDN</th>
                            <th>NIP</th>
                            <th>Gender</th>
                            <th>Id_Jurusan</th>
                            <th>Id_Prodi</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($data_dos as $item)
                            @php
                                $no++;
                            @endphp
                            <tr style="font-size: 13px" class="auto-width">
                                <td>{{ $no }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['nidn'] }}</td>
                                <td>{{ $item['nip'] }}</td>
                                <td>{{ $item['gender'] }}</td>
                                <td>{{ $item['id_jurusan'] }}</td>
                                <td>{{ $item['id_prodi'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['image'] }}</td>
                                <td>{{ $item['status'] }}</td>
                                <td><a href="#" class="btn btn-sm btn-primary  d-sm-inline-block"><i
                                            class="fas fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @if ($isEmpty)
                    <div class="alert alert-warning" role="alert">
                        Data tidak ditemukan.
                    </div>
                @endif --}}
{{--                 
                <div class="row">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57
                        entries</div>

                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
