@extends('dashboard.layouts.app')

@section('title','Data Tahun Akademik')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Tahun Akademik</h3>
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
                                    <tr>
                                        <th>No</th>
                                        <th>Semester Tahun Akademik</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ( $data_smtakad as $item)
                                    <tr>
                                        <td>{{ $data_smtakad->firstItem()+$loop->index }}</td>
                                        <td>{{ $item['smt_thn_akd']}}</td>
                                        <td>
                                            <span class="badge rounded-pill {{ $item->status ? 'bg-danger text-white' : 'bg-success text-white' }} py-2 px-4">
                                                {{ $item->status ? 'Tidak Aktif' : ' Aktif' }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
