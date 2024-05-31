@extends('dashboard.layouts.app')

@section('modal')
    @include('dashboard.datakbk.modal')
@endsection

@section('title','Data KBK')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 offset-md-1">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center mt-3">
                        <h3>Data KBK</h3>
                        <div class="card-header-form mt-3">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary mr-2"><i class="fas fa-search"></i></button>
                                    </div>
                                    <a href="#"
                                        class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">
                                        <i class="fas fa-download fa-sm text-white-50"></i> Print
                                    </a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="Modal">
                                        Tambah
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    @if (session()->has('success'))
                        <div class="alert alert-success col-lg-8" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body p-3 rounded">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode KBK</th>
                                        <th>Nama KBK</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_datakbk as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kodekbk }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <form action="/datakbk/{{ $item->id }}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin?')">Hapus</button>
                                                </form>

                                                <a href="/datakbk/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
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
