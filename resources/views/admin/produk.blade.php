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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title"><a href="{{ route('produk.create') }}" class="btn btn-primary">Add
                            Produk</a>
                    </div>
                    <div class="tab-pane show active" id="basic-datatable-preview">
                        <table id="datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div> <!-- end preview-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
    <script>
        $(function() {
            $("#datatable").DataTable({
                order: [],
                processing: true,
                serverSide: true,
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                language: {
                    searchPlaceholder: "Search...",
                    sSearch: "",
                    // lengthMenu: "_MENU_ items/page",
                },
                ajax: "",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "nama",
                        name: "nama",
                    },
                    {
                        data: "kategori",
                        name: "kategori",
                    },
                    {
                        data: "harga",
                        name: "harga",
                    },
                    {
                        data: "deskripsi",
                        name: "deskripsi",
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false,
                        className: "text-center",
                    },
                ],
            });
        });
    </script>
@endsection
