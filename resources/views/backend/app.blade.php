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

  <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/iconfonts/puse-icons-feather/feather.css') !!}">
  <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/css/vendor.bundle.base.css') !!}">
  <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/css/vendor.bundle.addons.css') !!}">
    <link rel="stylesheet" href="{!! asset('template/backend/assets/vendors/css/vendor.bundle.addons.css') !!}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{!! asset('template/backend/assets/css/shared/style.css') !!}">
  <link rel="stylesheet" href="{!! asset('template/backend/assets/css/main/style.css') !!}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{!! asset('template/backend/assets/images/favicon.png') !!}" />
  <style type="text/css">
    table {
      counter-reset: tableCount;
    }
    .counterCell:before {
      content: counter(tableCount);
      counter-increment: tableCount;
    }
  </style>

  @yield('custom_css')
</head>

<body class="sidebar-fixed">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('backend.partials._sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @include('flash::message')  
          @yield('content')
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{!! asset('template/backend/assets/vendors/js/vendor.bundle.base.js') !!}"></script>
  <script src="{!! asset('template/backend/assets/vendors/js/vendor.bundle.addons.js') !!}"></script>
  <!-- endinject -->

  <!-- inject:js -->
  <script src="{!! asset('template/backend/assets/js/shared/off-canvas.js') !!}"></script>
  <script src="{!! asset('template/backend/assets/js/shared/hoverable-collapse.js') !!}"></script>
  <script src="{!! asset('template/backend/assets/js/shared/misc.js') !!}"></script>
  <script src="{!! asset('template/backend/assets/js/shared/settings.js') !!}"></script>
  <script src="{!! asset('template/backend/assets/js/shared/todolist.js') !!}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{!! asset('template/backend/assets/js/shared/tabs.js') !!}"></script>
  <script src="{!! asset('template/backend/assets/js/shared/data-table.js') !!}"></script>
  <script>
    $(".service-menu a").click(function(event){
      event.stopPropagation();
      event.preventDefault();
      $(this).next("ul").toggleClass("service-collapse");
    });
  </script>
  @yield('custom_js')

  <script>
      // $('.dataTable').dataTable()
  </script>
  <!-- End custom js for this page-->
</body>

</html>
