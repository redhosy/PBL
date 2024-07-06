@extends('dashboard.layouts.app')

@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5 mb-3">
                <div class="card profile-widget">
                    <div class="profile-widget-header ml-4">
                        <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px;">
                            @if (Auth::user()->profile_photo_path)
                                <img alt="image" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                            @else
                                <img alt="image" src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name .'&background=f666b5&color=ffffff&size=150' }}" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                            @endif
                        </div>
                    </div>
                    
                    
                                       
                    <div class="profile-widget-description">
                        <label for="bio"><b><i class="bi bi-file-earmark-person-fill mr-1"></i>Bio</b></label>{!! Auth::user()->bio !!}
                    </div>
                    <hr>
                    <div class="card-body">
                        <!-- Form untuk reset password -->
                        <form method="POST" action="{{ route('profile.reset-password') }}">
                            @csrf
                            <div class="form-group">
                                <label for="password">Reset Password</label>
                                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Reset
                                </button>
                            </div>
                        </form>
                        <!-- Tambahkan pesan sukses/error -->
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7 mb-3">
                <div class="card">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                    <div class="invalid-feedback">
                                        Please fill in the name
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile_photo">Ganti Foto Profile</label>
                                <input id="profile_photo" type="file" class="form-control-file" name="profile_photo">
                                @error('profile_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Bio</label>
                                    <textarea class="form-control summernote-simple" name="bio">{{ Auth::user()->bio }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
