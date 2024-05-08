@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Data KBK Baru</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namakbk" class="form-label">Nama KBK</label>
                <input type="text" class="form-control @error('namakbk') is-invalid @enderror" id="namakbk" name="namakbk" value="{{ old('namakbk') }}">
                @error('namakbk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kodekbk" class="form-label">Kode KBK</label>
                <input type="text" class="form-control @error('kodekbk') is-invalid @enderror" id="kodekbk" name="kodekbk" value="{{ old('kodekbk') }}">
                @error('kodekbk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>       

            <div class="mb-3">
                <label for="body" class="form-label">Deskripsi</label>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" id="body" name="body" value="{{ old('body') }}" required>
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
 