<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }} | @yield('pageTitle')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/vendors/css/vendor.bundle.base.css') !!}">
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/vendors/css/vendor.bundle.addons.css') !!}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/css/style.css') !!}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{!! asset('theme/StarAdmin/images/favicon.png') !!}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            
            @yield('content')
            
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{!! asset('theme/StarAdmin/vendors/js/vendor.bundle.base.js') !!}"></script>
    <script src="{!! asset('theme/StarAdmin/vendors/js/vendor.bundle.addons.js') !!}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{!! asset('theme/StarAdmin/js/off-canvas.js') !!}"></script>
    <script src="{!! asset('theme/StarAdmin/js/misc.js') !!}"></script>
    <!-- endinject -->
</body>

</html>