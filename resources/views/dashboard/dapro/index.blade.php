@extends('dashboard.layouts.app')

@section('title','Data Program Studi')

@section('scriptpages')
@include('dashboard.dapro.scripts')
@endsection


@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Program Studi</h3>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="button" id="searchButton"  class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                                        <th>Nama Prodi</th>
                                        <th>Jurusan</th>
                                        <th>Jenjang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    @foreach ($data_pro as $item)
                                        <tr id="data{{ $item->id }}">
                                            <td>{{ $data_pro->firstItem()+$loop->index  }}</td>
                                            <td>{{ $item->prodi }}</td>
                                            <td>{{ $item->jurusan->jurusan }}</td>
                                            <td>{{ $item->id_jenjang }}</td>
                                            <td>
                                                <button class="btn btn-icon btn-info detailBtn" data-id="{{ $item->id }}"><i
                                                    class="fas fa-info-circle"></i></button>
                                             </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data_pro->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('dashboard.dapro.detailModal')
