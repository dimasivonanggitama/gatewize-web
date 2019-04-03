<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('pageTitle') | {{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/css/vendor.bundle.base.css') !!}">
    <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/css/vendor.bundle.addons.css') !!}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! asset('template/backend/assets/css/style.css') !!}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{!! asset('template/backend/assets/images/favicon.png') !!}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">

            @yield('content')

        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{!! asset('template/backend/assets/vendors/js/vendor.bundle.base.js') !!}"></script>
    <script src="{!! asset('template/backend/assets/vendors/js/vendor.bundle.addons.js') !!}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{!! asset('template/backend/assets/js/off-canvas.js') !!}"></script>
    <script src="{!! asset('template/backend/assets/js/misc.js') !!}"></script>
    <!-- endinject -->
</body>

</html>
