<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('pageTitle') | {{ config('app.name', 'Laravel') }}</title>
    <!-- Meta Share -->
    <meta property="og:title" content="Start.ly — Agency One Page Parallax Template" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="images/screen.jpg" />
    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Product+Sans:300,400,700" rel="stylesheet">
    <!-- build:css css/app.min.css -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/global/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="css/global/plugins/icon-font.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- /build -->
</head>

<body>
    <header class="bg-light" id="home">
        @include('home.partials._navbar')

        @yield('hero')
    </header>
    @yield('content')



    @include('home.partials._footer')
    <!-- // end #about.section -->
    <!-- // end .agency -->
    <!-- JS Files -->
    <!-- build:js js/app.min.js -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="js/global/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/global/bootstrap.bundle.min.js"></script>
    <!-- Main JS -->
    <script src="js/script.js"></script>
    <!-- /build -->
</body>

</html>
