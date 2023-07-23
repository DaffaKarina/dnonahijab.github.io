@extends('front.layouts.main')
@section('content')
    {{--  <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="slider slider-for">
                        @foreach ($produk->images as $item)
                            <div class="col-4 mr-3">
                                <a href="#">
                                    <img class="card-img img-fluid" src="{{ asset($item->path) }}" alt="Product Image 4">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider slider-nav mt-4">
                        @foreach ($produk->images as $item)
                            <div style="margin-left: 20px;">
                                <a href="#">
                                    <img class="card-img img-fluid" src="{{ asset($item->path) }}" alt="Product Image 4">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $produk->nama }}</h1>
                            <h6 class="text-success">
                                {{ $produk->kategori->nama }}
                            </h6>
                            <h3 class="text-success h3 py-2">
                                {{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}</h3>
                            <h6>Deskripsi:</h6>
                            <p>{{ $produk->deskripsi }}</p>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a target="_blank"
                                        href="https://wa.me/62{{ \App\Models\User::find(1)->telp }}?text=Halo%20Benang%20Sari,%20saya%20tertarik%20dengan%20produk%20ini%20{{ route('front.detail', $item->id) }}"
                                        class="btn btn-success btn-lg"> <i class="fab fa-whatsapp"></i> Hubungi
                                        Penjual</a>
                                </div>
                                <div class="col d-grid">
                                    <a href="{{ route('front.shop') }}" class="btn btn-danger btn-lg"><i
                                            class="fa fa-arrow-circle-right"></i> Kembali</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Produk Terkait</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                @foreach ($terkait as $item)
                    <div class="p-2 pb-3">
                        <div class="product-wap card rounded-0">
                            <div class="card rounded-0">
                                @foreach ($item->images->take(1) as $image)
                                    <img class="card-img rounded-0 img-fluid" src="{{ asset($image->path) }}">
                                @endforeach
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2"
                                                href="{{ route('front.detail', $item->id) }}"><i
                                                    class="far fa-eye"></i></a>
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
    <!-- End Article -->
    <!-- Start Slider Script -->
    <script src="{{ asset('front/js/slick.min.js') }}"></script>
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });

        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>  --}}




    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Detail Produk</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('home') }}">Beranda</a>
                        <a href="{{ route('shop') }}">Toko</a>
                        <span>Detail Produk</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($produk->images as $key => $item)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}">
                                        <img width="60" height="60" src="{{ asset($item->path) }}" alt="" />
                                    </li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($produk->images as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100" src="{{ asset($item->path) }}" alt=" slide" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $produk->nama }}</h3>
                        <h2> {{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Category</span> : Household</a>
                            </li>
                        </ul>
                        <p>
                            {{ $produk->deskripsi }}
                        </p>
                        <div class="card_area">
                            <a class="main_btn" target="_blank"
                                href="https://wa.me/62{{ \App\Models\User::find(1)->telp }}?text=Assalamualaikum Wr. Wb.,%20Halo%20D'Nona%20Hijab,%20saya%20ingin%20membeli%20produk%20ini%20{{ route('detail', $item->id) }}">Beli
                                Sekarang</a>
                            <a class="btn btn-secondary" href="{{ route('shop') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">


        </div>
    </section>
    <!--================End Product Description Area =================-->
@endsection
