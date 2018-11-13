<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name', 'Laravel') }} | 
    @isset($page) {{ $page }} @endisset
    @empty($page) Admin @endempty
  </title>
  
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
  <link rel="stylesheet" href="{!! asset('theme/StarAdmin/css/demo-1.css') !!}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{!! asset('theme/StarAdmin/images/favicon.png') !!}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partials._sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
  <!-- Custom js for this page-->
  <script src="{!! asset('theme/StarAdmin/js/dashboard.js') !!}"></script>
  <script src="{!! asset('theme/StarAdmin/js/tabs.js') !!}"></script>
  <!-- End custom js for this page-->
</body>

</html>