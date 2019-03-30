<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home') }}">
				<img src="{{ asset('images/logo/Gatewize Logo.png') }}" alt="Gatewize" class="img-fluid" width="30%">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="site-nav">
				<ul class="navbar-nav text-sm-left ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('privacy-policy') }}">Privacy Policy</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('tos') }}">Term_of_Service</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
					</li>

					@if (Route::has('login'))
						@auth
							<li class="nav-item text-center">
								<a href="{{ url('/home') }}">Admin</a>
							</li>
						@else
							<li class="nav-item text-center">
								<a class="btn align-middle btn-outline-primary my-2 my-lg-0" href="{{ route('login') }}">Login</a>
							</li>

							@if (Route::has('register'))
								<li class="nav-item text-center">
									<a class="btn align-middle btn-primary my-2 my-lg-0" href="{{ route('register') }}">Register</a>
								</li>
							@endif
						@endauth
					@endif
					
					<li class="nav-item text-center">
						<a href="#signup" class="btn align-middle btn-primary my-2 my-lg-0">Register</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!-- // end navbar -->