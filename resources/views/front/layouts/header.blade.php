<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: {{ \App\Models\User::find(1)->telp }}</p>
                        <p>Email: dnonahijab@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">

                            <li>
                                <a href="{{ route('login') }}" target="_blank">
                                    Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}">
                    <img src="{{ asset('front/img/logo.png') }}" width="120" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item {{ \Route::is('home') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                                </li>
                                <li class="nav-item {{ \Route::is('shop') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('shop') }}">Toko</a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Kategori</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="category.html">Kategori</a>
                                        </li>

                                        @foreach ($kategori as $item)
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('shop') }}?kategori={{ $item->nama }}">{{ $item->nama }}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li class="nav-item {{ \Route::is('about') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>