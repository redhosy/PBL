@extends('dashboard.layouts.app')

@section('title', 'Data Pengguna')

@section('scriptpages')
    @include('dashboard.pengguna.scripts')
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-0">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Pengguna</h3>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="button" id="searchButton" class="btn btn-primary"><i
                                                class="fas fa-search"></i>
                                        </button>
                                    </div>

                                    <button class="btn btn-success ml-2" type="button" data-toggle="modal" id="modalAdd"><i
                                            class="fas fa-plus"></i></button>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    {{-- @foreach ($data_user as $item)
                                        <tr id="data{{ $item->id }}">
                                            <td>{{ $data_user->firstItem() + $loop->index }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <button class="btn btn-icon btn-info detailBtn" data-id="{{ $item->id }}"><i
                                                    class="fas fa-info-circle"></i></button>
                                             </td>
                                        </tr> --}}
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('dashboard.pengguna.detailModal')
