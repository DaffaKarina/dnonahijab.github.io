@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title">
                    <div class=" mt-3 alert alert-info alert-dismissible bg-info text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        Selamat Datang <strong>{{ Auth::user()->name }}, </strong> saat ini anda telah memiliki
                        {{ $produkCount }}
                        produk! Tambah Produk
                        Baru? <strong><a class="text-warning" href="{{ route('produk.create') }}">Klik
                                disini!</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    {{-- <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                    <h3><span>29</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Projects</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                    <h3><span>715</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Tasks</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                    <h3><span>31</span></h3>
                                    <p class="text-muted font-15 mb-0">Members</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                    <h3><span>93%</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                    <p class="text-muted font-15 mb-0">Productivity</p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
    </div> --}}
    <!-- end row-->
@endsection
