<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
		<a class="navbar-brand brand-logo" href="index.html">
			<img src="{{ asset('theme/StarAdmin/images/gatewize-logo.png') }}" alt="logo" />
		</a>
		<a class="navbar-brand brand-logo-mini" href="index.html">
			<img src="{{ asset('theme/StarAdmin/images/logo-mini.svg') }}" alt="logo" />
		</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
		<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Integration</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Store</a>
          </li>
        </ul>
		<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
			{{-- <li class="nav-item">
				<a href="#" class="nav-link">
					<i class="mdi mdi-elevation-rise"></i>Deposit
				</a>
			</li> --}}
		</ul>
		<ul class="navbar-nav navbar-nav-right">
			<li class="nav-item">Balance : Rp. {{ number_format(Auth::user()->balance) }}</li>
			<li class="nav-item dropdown d-none d-xl-inline-block">
				<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<span class="profile-text">Hello, {{ Auth::user()->fullname }} !</span>
					<img class="img-xs rounded-circle" src="{{ Auth::user()->getAvatar() }}" alt="Profile image">
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
					<a class="dropdown-item mt-2" href="{{ route('profile') }}">
						Manage Accounts
					</a>
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						{{ __('Logout') }}

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav>