<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('front/img/logo.png') }}" width="120" alt="" />

        </span>
        <span class="logo-sm">
            <img src="{{ asset('front/img/logo.png') }}" width="40" alt="" />
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item">Menu</li>
            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('home') }}" target="_blank" class="side-nav-link">
                    <i class="uil-expand-from-corner"></i>
                    <span> Kunjungi Website </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('produk') }}" class="side-nav-link">
                    <i class="uil-store-alt"></i>
                    <span> Data Produk </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('kategori') }}" class="side-nav-link">
                    <i class="uil-list-ul"></i>
                    <span> Kategori </span>
                </a>
            </li>

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                    aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Products</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Products Details</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="side-nav-title side-nav-item">User</li>
            <li class="side-nav-item">
                <a href="{{ route('profile', Auth::user()->id) }}" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Profil </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="modal" data-bs-target="#logout-modal" href="javascript: void(0);"
                    class="side-nav-link">
                    <i class="uil-sign-out-alt"></i>
                    <span> Log Out </span>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
