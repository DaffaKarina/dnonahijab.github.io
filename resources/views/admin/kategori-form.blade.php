@extends('layouts.main')
@section('content')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kategori') }}">Kategori</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title }}</h4>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body" id="preview">
                    <form action="{{ route('kategori.store', 'profile') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" class="form-control" name="id"
                            value="{{ Route::is('kategori.edit') ? $kategori->id : '' }}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama"
                                value="{{ Route::is('kategori.edit') ? $kategori->nama : '' }}" placeholder="Nama">
                            <label>Nama</label>
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="deskripsi" placeholder="Email">{{ Route::is('kategori.edit') ? $kategori->deskripsi : '' }}</textarea>
                            <label>Deskripsi</label>
                            @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end row -->
    @endsection
