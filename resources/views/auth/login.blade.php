<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script src="{{ asset('admin/loader/jquery.preloader.min.js') }}"></script>
    <link href="{{ asset('admin/loader/preloader.css') }}" rel="stylesheet" type="text/css">

    {{-- <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}"> --}}
    <!-- App css -->
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('admin/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loadingg authentication-bg"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="{{ route('login') }}">
                                <span>
                                    <img src="{{ asset('front/img/logo.png') }}" width="120" alt="" />
                                </span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Form Login</h4>
                                </p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" required=""
                                        value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">

                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin"
                                            name="remember">
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        Copyright &copy; {{ date('Y') . '. ' . config('app.name') }}. All Right
        Reserved.
    </footer>

    <!-- bundle -->
    <script src="{{ asset('admin/js/app.min.js') }}"></script>

    <script>
        $("input, select, textarea").bind("change click", function() {
            $(this).next().next(".text-danger").empty();
        });

        $(window).bind("beforeunload", function() {
            $('.loadingg').preloader({
                percent: '',
                text: 'Menunggu...',
                duration: '',
                zIndex: '',
                setRelative: false
            });
        });
    </script>
</body>

</html>
