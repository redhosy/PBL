@extends('dashboard.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Data KBK Baru</h1>
    </div>

    <div class="col-6">
        <form action="/datakbk" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namakbk" class="form-label">Nama KBK</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kodekbk" class="form-label">Kode KBK</label>
                <input type="text" class="form-control @error('kodekbk') is-invalid @enderror" id="kodekbk" name="kodekbk" value="{{ old('kodekbk') }}" required>
                @error('kodekbk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                @error('deskripsi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
