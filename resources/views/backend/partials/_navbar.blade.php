<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
		<a class="navbar-brand brand-logo" href="index.html">
			<img src="{{ asset('template/backend/assets/images/img_logo.png') }}" alt="logo" />
		</a>
		<a class="navbar-brand brand-logo-mini" href="index.html">
			<img src="{{ asset('template/backend/assets/images/logo-mini.svg') }}" alt="logo" />
		</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
		<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
		</button>
		<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
            <li class="nav-item">
            <a href="{{route('integration')}}" class="nav-link">
              <i class="mdi mdi-newspaper"></i>News</a>
          </li>
          <li class="nav-item">
            <a href="{{route('integration')}}" class="nav-link">
              <i class="mdi mdi-transit-connection-variant"></i>Integration</a>
          </li>
          <li class="nav-item">
            <a href="{{route('store')}}" class="nav-link">
              <i class="mdi mdi-shopping"></i>Store</a>
          </li>
        </ul>

		<ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown ml-4">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count bg-success">4</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-alert m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                    <p class="font-weight-light small-text mb-0"> Just now </p>
                  </div>
                </a>
              </div>
            </li>
			<li class="nav-item">Balance : Rp. {{ number_format(Auth::user()->balance) }}</li>
			<li class="nav-item dropdown d-none d-xl-inline-block">
				<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<span class="profile-text">Hello, {{ Auth::user()->fullname }} !</span>
					<img class="img-xs rounded-circle" src="{{ Gravatar::get(Auth::user()->email) }}" alt="Image">
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
					<a class="dropdown-item mt-2" href="{{ route('profile') }}">
						<i class="mdi mdi-account"></i>
						Manage Accounts
					</a>
					<a class="dropdown-item text-danger" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="mdi mdi-power"></i>
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
