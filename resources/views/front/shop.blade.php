@extends('front.layouts.main')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Toko</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('home') }}">Beranda</a>
                        <span>Toko</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <div class="col-md-6 col-lg-12">
                                <div class="d-flex">
                                    <form action="">
                                        <div class="input-group">
                                            <input type="text" value="{{ request('search') }}" name="search"
                                                id="search" placeholder="Cari Produk" class="form-control">
                                            <div class="input-group-append ">
                                                <button class="btn btn-success" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                            @if ($produk->count())
                                @foreach ($produk as $item)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-product">
                                            <div class="product-img">
                                                @foreach ($item->images->take(1) as $image)
                                                    <img class="card-img rounded-0 img-fluid"
                                                        src="{{ asset($image->path) }}">
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
                                                    <span
                                                        class="mr-4">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <p>Tidak ada Produk!</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div div="row">
                            {{ $produk->links('front.layouts.paginationcustom') }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Filter Kategori</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach ($kategori as $item)
                                        <li class="{{ request('kategori') == $item->nama ? 'active' : '' }}">
                                            <a
                                                href="{{ route('shop') }}?kategori={{ $item->nama }}">{{ $item->nama }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
@endsection
