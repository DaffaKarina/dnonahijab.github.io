@extends('front.layouts.main')
@section('content')
    <!-- Start Banner Hero -->
    {{--  <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('banner.png') }}" style="height: 500px" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">


                                <div class="logo-holder logo-6" style="text-align:left;">
                                    <h3
                                        style="color: #057430;
    font-family: 'Cinzel', serif;
    font-weight: 300;
    line-height:1.3;">
                                        HUMBA <span
                                            style="background: #057430;
    color: #fff;
    display: inline-block;
    padding: 0 16px;">Store</span>
                                    </h3>
                                </div>


                                <p>
                                    Selamat datang diwebsite Humba Store!
                                    <a rel="sponsored" class="text-success" href="{{ route('front.shop') }}">Belanja
                                        Sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- End Banner Hero -->

    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Produk Terbaru</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                @foreach ($item->images->take(1) as $image)
                                    <img class="card-img rounded-0 img-fluid" src="{{ asset($image->path) }}">
                                @endforeach
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2"
                                                href="{{ route('front.detail', $item->id) }}"><i class="far fa-eye"></i></a>
                                        </li>
                                        <li><a class="btn btn-success text-white mt-2" target="_blank"
                                                href="https://wa.me/62{{ \App\Models\User::find(1)->telp }}?text=Halo%20Benang%20Sari,%20saya%20tertarik%20dengan%20produk%20ini%20{{ route('front.detail', $item->id) }}"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('front.detail', $item->id) }}"
                                    class="h3 text-decoration-none">{{ $item->nama }}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="text-success">
                                        <h6>{{ $item->kategori->nama }}</h6>
                                    </li>

                                </ul>
                                <h4 class="text-center mb-0">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Featured Product -->
    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Kategori Produk Terbaru</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($kategoriFr as $item)
                <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="{{ route('front.shop') }}?kategori={{ $item->nama }}"><img
                            src="{{ asset('kategori.png') }}" class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3">{{ $item->nama }}</h5>
                    <p class="text-center"><a href="{{ route('front.shop') }}?kategori={{ $item->nama }}"
                            class="btn btn-success">Lihat</a></p>
                </div>
            @endforeach
        </div>
    </section>  --}}

    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        {{--  <p class="sub text-uppercase">men Collection</p>  --}}
                        <h3>Tunjukan <span>Pesonamu</span> <br />dengan <span>1001</span> <br />Pilihan <span>Hijab</span>
                        </h3>
                        {{--  <h4>Fowl saw dry which a above together place.</h4>  --}}
                        <a class="main_btn mt-40" href="{{ route('shop') }}">Belanja Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->




    <!-- Start feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <span class="title">
                            <i class="flaticon-money"></i>
                            <h3>Garansi Uang Kembali</h3>
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <span class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Pengiriman Gratis</h3>
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <span class="title">
                            <i class="flaticon-support"></i>
                            <h3>Terbuka untuk Komplain</h3>
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <span class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Transaksi Langsung via WA</h3>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->


    <!--================ Feature Product Area =================-->
    <section class="feature_product_area  section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Produk Terbaru</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                @foreach ($item->images->take(1) as $image)
                                    <img class="card-img rounded-0 img-fluid" src="{{ asset($image->path) }}">
                                @endforeach
                                <div class="p_icon">
                                    <a href="{{ route('detail', $item->id) }}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a target="_blank"
                                        href="https://wa.me/62{{ \App\Models\User::find(1)->telp }}?text=Assalamualaikum Wr. Wb.,%20Halo%20D'Nona%20Hijab,%20saya%20ingin%20membeli%20produk%20ini%20{{ route('detail', $item->id) }}">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>{{ $item->nama }}</h4>
                                </a>
                                <small>{{ $item->kategori->nama }}</small>
                                <div class="mt-3">
                                    <span class="mr-4">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->


    <!--================ Offer Area =================-->
    <section class="offer_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="offset-lg-4 col-lg-6 text-center">
                    <div class="offer_content">
                        <h3 class="text-uppercase mb-40">Pembelian Pertama</h3>
                        <h2 class="text-uppercase">30% off</h2>
                        <a href="{{ route('shop') }}" class="main_btn mb-20 mt-5">Dapatkan Promo</a>
                        <p>Waktu Terbatas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Offer Area =================-->
    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Kategori Pilihan</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($kategoriFr as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-btm">
                                <a href="{{ route('shop') }}?kategori={{ $item->nama }}" class="d-block">
                                    <h4>{{ $item->nama }}</h4>
                                </a>
                                <div class="mt-3">
                                    <a href="{{ route('shop') }}?kategori={{ $item->nama }}" class="mt-5">Lihat
                                        Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->
@endsection
