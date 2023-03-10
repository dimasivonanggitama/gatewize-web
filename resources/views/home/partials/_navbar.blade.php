<nav class="navbar navbar-expand-lg navbar-light navbar-transparent">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="{{ asset('images/logo/img_logo.png') }}" alt="Gatewize" class="img-fluid" width="30%" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="site-nav">
        <ul class="navbar-nav text-sm-left ml-auto" style="overflow: auto; white-space: nowrap;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}#about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}#feature">Feature</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}#contact">Contact Us</a>
            </li>


            <li class="nav-item text-center">
                <a href="{{ route('login') }}" class="btn align-middle btn-outline-primary my-2 my-lg-0">Login</a>
            </li>
            <li class="nav-item text-center">
                <a href="{{ route('register') }}" class="btn align-middle btn-primary my-2 my-lg-0">Sign Up</a>
            </li>
        </ul>

    </div>
</div>
</nav>
