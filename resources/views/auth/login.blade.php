@extends('auth.app')

@section('pageTitle', 'Login')

@section('content')
	<div class="content-wrapper auth p-0 theme-two">
        <div class="row d-flex align-items-stretch">
            <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
				<div class="slide-content bg-1"> </div>
            </div>
            <div class="col-12 col-md-8 h-100 bg-white">
				<div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
					<div class="nav-get-started">
						<p>Don't have an account?</p>
						<a class="btn get-started-btn" href="{{ route('register') }}">GET STARTED</a>
					</div>
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<h3 class="mr-auto">Hello! let's get started</h3>
						<p class="mb-5 mr-auto">Enter your details below.</p>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
									</span>
								</div>
								<input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
							</div>
							@if ($errors->has('username'))
								<small id="usernameHelpBlock" class="form-text text-muted">
									<strong>{{ $errors->first('username') }}</strong>
								</small>
							@endif
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="mdi mdi-lock-outline"></i>
									</span>
								</div>
								<input type="password" class="form-control" name="password" placeholder="*********" value="{{ old('username') }}" required>
							</div>
							@if ($errors->has('password'))
								<small id="usernameHelpBlock" class="form-text text-muted">
									<strong>{{ $errors->first('password') }}</strong>
								</small>
							@endif
						</div>
						<div class="form-group">
							<button class="btn btn-primary submit-btn">SIGN IN</button>
							<a href="{{ route('password.request') }}" class="text-small forgot-password text-black" style="margin-left:20px;font-size:10pt;">Forgot Password</a>
						</div>
						<div class="wrapper mt-5 text-gray">
							<p class="footer-text">Copyright © 2019 Gatewize. All rights reserved.</p>
							<ul class="auth-footer text-gray">
								<li>
									<a href="{{ route('terms') }}">Terms of Service</a>
								</li>
								<li>
									<a href="{{ route('privacy') }}">Privacy Policy</a>
								</li>
							</ul>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
@endsection
