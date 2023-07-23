<!DOCTYPE html>
<html lang="en">
@section('head')
    @include('layouts.head')
@show

<body class="loadingg"
    data-layout-config='{"leftSideBarTheme":"default","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        @section('sidebar')
            @include('layouts.sidebar')
        @show
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @section('topbar')
                    @include('layouts.topbar')
                @show
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div> <!-- container -->
            </div> <!-- content -->
            @section('footer')
                @include('layouts.footer')
            @show
        </div>
    </div>
    <!-- END wrapper -->
    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->
    @section('script')
        @include('layouts.script')
    @show

    <div id="logout-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topModalLabel">Konfirmasi!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Log Out</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <script>
        // img preview
        function readURL(input) {
            for (var i = 0; i < input.files.length; i++) {
                if (input.files[i]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#preview").find("img").attr("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

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
