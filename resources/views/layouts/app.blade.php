<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title page -->
		<title>@yield('pageTitle') | {{ config('app.name', 'Laravel') }} </title>
		
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Meta Share -->
		<meta property="og:title" content="Gatewize" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="images/screen.jpg" />
		
		<!-- CSS Files -->
		<link href="https://fonts.googleapis.com/css?family=Product+Sans:300,400,700" rel="stylesheet">
		
		<!-- build:css css/app.min.css -->
			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="{{ asset('css/global/bootstrap.min.css') }}">
			
			<!-- Plugins -->
			<link rel="stylesheet" href="{{ asset('css/global/plugins/icon-font.css') }}">
			
			<!-- Main CSS -->
			<link rel="stylesheet" href="{{ asset('css/style.css') }}">
			
		<!-- /build -->
	</head>

	<body class="overflow-hidden">
		<header id="home">
			<!-- partial:partials/_navbar.html -->
			@include('layouts.partials._navbar')
		</header>
			
		<header id="home">			
			<!-- partial -->
				@yield('content')
			<!-- main-panel ends -->

			<!-- page-body-wrapper ends -->
			
		<!-- container-scroller -->
		</header>

		<!-- #footer# -->
			@include('layouts.partials._footer')
		<!-- #ends of footer# -->
	</body>
	<!-- JS Files -->
	<!-- build:js js/app.min.js -->
		<!-- jQuery first, then Tether, then Bootstrap JS. -->
		<script src="{{ asset('js/global/jquery-3.2.1.min.js') }}"></script>
		
		<!-- Bootstrap JS -->
		<script src="{{ asset('js/global/bootstrap.bundle.min.js') }}"></script>
		
		<!-- Main JS -->
		<script src="{{ asset('js/script.js') }}"></script>
		
	<!-- /build -->
</html>

