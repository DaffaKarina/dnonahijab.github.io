@extends('front.layouts.main')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Tentang Kami</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('home') }}">Beranda</a>
                        <span>Tentang Kami</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- ================ contact section start ================= -->
    <section class="section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="mb-4">
                        <div class="container">
                            <h2 class="text-heading title_color">What is hijab ?</h2>
                            <p class="sample-text">
                                Hijab adalah kain penutup kepala perempuan muslim yang menutupi bagian atas kepala dan
                                rambut.
                                Kerudung bisa dikenakan karena berbagai tujuan: seperti demi kehangatan, untuk kebersihan,
                                untuk
                                fashion, demi kesopanan, ataupun berbagai alasan lainnya.

                            </p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Kota Malang, Jawa Timur.</h3>
                            <p>Sukun, 19645</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">{{ \App\Models\User::find(1)->telp }}</a></h3>
                            <p>Buka Setiap Senin-Jumat 7:00 - 20:00</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">dnonahijab@gmail.com</a></h3>
                            <p>Kirimkan kami hasil review produk kami!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

    {{--  <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>Tentang Benang Sari</h1>
                    <p>
                        Benang Sari adalah Gerai Batik yang beralamat di Bajawa Kab.Ndaga Ngada.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('front/img/about-hero.svg') }}" alt="About Hero">
                </div>
            </div>
        </div>
    </section>  --}}
    <!-- Close Banner -->
@endsection
