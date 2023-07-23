<head>
    <meta charset="utf-8">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <script src="{{ asset('admin/loader/jquery.preloader.min.js') }}"></script>
    <link href="{{ asset('admin/loader/preloader.css') }}" rel="stylesheet" type="text/css">

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- Datatables css -->
    <link href="{{ asset('admin/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('admin/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style">

</head>
