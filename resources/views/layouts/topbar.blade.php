<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    @if (!empty(Auth::user()->image->name) && file_exists(Auth::user()->image->path))
                        <img src="{{ asset(Auth::user()->image->path) }}" alt="user-image" class="rounded-circle">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="user-image"
                            class="rounded-circle">
                    @endif

                </span>
                <span>
                    <span class="account-user-name">{{ Auth::user()->name }}</span>
                    <span class="account-position">Administrator</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <a href="{{ route('profile', Auth::user()->id) }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-outline me-1"></i>
                    <span>Profil</span>
                </a>

                <a data-bs-toggle="modal" data-bs-target="#logout-modal" href="javascript: void(0);"
                    class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span> Log Out </span>
                </a>
            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
<!-- end Topbar -->
