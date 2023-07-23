@extends('layouts.main')
@section('content')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('produk') }}">Produk</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title }}</h4>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body" id="preview">
                    {{-- <div class="form-floating mb-3">
                        <form action="{{ route('produk.store', 'profile') }}" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="dropzone">
                        </form>
                    </div> --}}
                    <form action="{{ route('produk.store', 'produk') }}" method="POST" id="produk-form">
                        @csrf
                        @method('POST')
                        <input type="hidden" class="form-control" name="id"
                            value="{{ Route::is('produk.edit') ? $produk->id : '' }}">

                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ Route::is('produk.edit') ? $produk->nama : '' }}" placeholder="Nama">
                                    <label>Nama Produk</label>
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Floating label select example" name="kategori">
                                        <option value="">Pilih kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}"
                                                {{ Route::is('produk.edit') && $produk->kategori_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label>Kategori</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="harga"
                                value="{{ Route::is('produk.edit') ? $produk->harga : '' }}" placeholder="Harga">
                            <label>Harga (Rp)</label>
                            @error('harga')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="floatingTextarea" style="height: 100px">{{ Route::is('produk.edit') ? $produk->deskripsi : '' }}</textarea>
                            <label for="floatingTextarea">Deskripsi</label>
                            @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <div id="dZUpload" class="dropzone">
                                <div class="dz-default dz-message p-2">
                                    <span class="d-block mb-1">Browse your images</span>
                                    <small class="d-block text-muted">Maximum file size is 2MB</small>
                                </div>
                            </div>
                            <label>Gambar</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>

        <script>
            var uploadedDocumentMap = {};
            Dropzone.autoDiscover = false;
            $("#dZUpload").dropzone({
                url: '/produk/simpan/images',
                addRemoveLinks: true,
                maxFilesize: 2, // MB
                acceptedFiles: ".jpeg,.jpg,.png",
                maxFiles: 5,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(file, response) {
                    $("#produk-form").append(
                        '<input type="hidden" name="images[]" value="' +
                        response.name +
                        '">'
                    );
                    uploadedDocumentMap[file.name] = response.name;
                },

                @if (Route::is('produk.edit') && $produk->images->count())
                    init: function() {
                        thisDropzone = this;
                        @foreach ($produk->images as $key => $item)
                            $("#produk-form").append(
                                '<input type="hidden" name="images[]" value="{{ $item->name }}">'
                            );

                            var mockFile{{ $item->id }} = {
                                name: '{{ $item->name }}',
                                size: '{{ $item->size }}'
                            };

                            thisDropzone.displayExistingFile(mockFile{{ $item->id }},
                                "{{ asset('storage/images/' . $item->name) }}");
                        @endforeach

                    },
                @endif
                removedfile: function(file) {

                    file.previewElement.remove();

                    var name = "";
                    if (typeof file.file_name !== "undefined") {
                        name = file.file_name;
                    } else {
                        name = uploadedDocumentMap[file.name];
                    }

                    @if (Route::is('produk.edit'))
                        name = file.name;
                        $("#produk-form")
                            .find('input[name="images[]"][value="' + file.name + '"]')
                            .remove();
                    @endif
                    $("#produk-form")
                        .find('input[name="images[]"][value="' + name + '"]')
                        .remove();

                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    });
                    $.ajax({
                        url: "/produk/images/destroy/" + name,
                        type: "DELETE",
                        dataType: "JSON",
                        success: function(response) {
                            // console.log(response)
                        },
                        error: function(response) {
                            //console.log(response)

                        },
                    });
                },
            });
        </script>
    @endsection
