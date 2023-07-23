@extends('layouts.main')
@section('content')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title }}</h4>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success - </strong> {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error - </strong> {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body" id="preview">
                    <div class="text-center">
                        @if (!empty($profile->image->name) && file_exists($profile->image->path))
                            <img src="{{ asset($profile->image->path) }}" alt="user-image"
                                class="rounded-circle avatar-lg img-thumbnail">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ $profile->name }}" alt="user-image"
                                class="rounded-circle avatar-lg img-thumbnail">
                        @endif
                        <div class="mb-1"></div>

                        @if (!empty($profile->image->name) && file_exists($profile->image->path))
                            <form method="POST" action="{{ route('profile.destroy', ['picture', $profile->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-2">Delete</button>
                            </form>
                        @endif
                    </div>
                    <form action="{{ route('profile.store', 'profile') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('POST')
                        <input type="hidden" class="form-control" name="id" value="{{ $profile->id }}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}"
                                placeholder="Nama">
                            <label>Nama</label>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" value="{{ $profile->email }}"
                                placeholder="Email">
                            <label>Email address</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="telepon" value="{{ $profile->telp }}"
                                placeholder="Telepon/Wa">
                            <label>Telepon/Wa</label>
                            @error('telepon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="picture" accept="image/*" />
                            <label>Foto Profil</label>
                            @error('picture')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end row -->
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.store', 'password') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" class="form-control" name="id" value="{{ $profile->id }}">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password Baru">
                            <label>Password Baru</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Konfirmasi Password Baru">
                            <label>Konfirmasi Password Baru</label>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end row -->

        <script>
            $('[name="picture"]').change(function(e) {
                readURL(this);
            });
        </script>
    @endsection
