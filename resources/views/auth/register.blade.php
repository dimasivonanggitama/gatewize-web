@extends('auth.app')

@section('pageTitle', 'Register')

@section('content')
	<div class="content-wrapper auth p-0 theme-two">
		<div class="row d-flex align-items-stretch">
            <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
				<div class="slide-content bg-2"> </div>
            </div>
            <div class="col-12 col-md-8 h-100 bg-white">
				<div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
					<div class="nav-get-started">
						<p>Already have an account?</p>
						<a class="btn get-started-btn" href="{{ route('login') }}">SIGN IN</a>
					</div>
					<form action="{{ route('register') }}" method="POST">
						@csrf
						<h3 class="mr-auto">Register</h3>
						<p class="mb-5 mr-auto">Enter your details below.</p>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Fullname" name="fullname" value="{{ old('fullname') }}">
								</div>
								@if ($errors->has('fullname'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('fullname') }}</strong>
									</small>
								@endif
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
								</div>
								@if ($errors->has('username'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('username') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="E-mail address" name="email" value="{{ old('email') }}">
								</div>
								@if ($errors->has('email'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('email') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-lock-outline"></i>
										</span>
									</div>
									<input type="password" class="form-control" placeholder="Password" name="password" >
								</div>
								@if ($errors->has('password'))
									<small class="form-text text-muted">
										<strong>{{ $errors->first('password') }}</strong>
									</small>
								@endif
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-lock-outline"></i>
										</span>
									</div>
									<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Username Telegram" name="telegram" value="{{ old('telegram') }}">
								</div>
								@if ($errors->has('telegram'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('telegram') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Alamat Lengkap" name="address" value="{{ old('address') }}">
								</div>
								@if ($errors->has('address'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('address') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary submit-btn">SIGN IN</button>
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
				<div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
					<div class="nav-get-started">
						<p>Already have an account?</p>
						<a class="btn get-started-btn" href="{{ route('login') }}">SIGN IN</a>
					</div>
					<form action="{{ route('register') }}" method="POST">
						@csrf
						<h3 class="mr-auto">Register</h3>
						<p class="mb-5 mr-auto">Enter your details below.</p>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Fullname" name="fullname" value="{{ old('fullname') }}">
								</div>
								@if ($errors->has('fullname'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('fullname') }}</strong>
									</small>
								@endif
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
								</div>
								@if ($errors->has('username'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('username') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="E-mail address" name="email" value="{{ old('email') }}">
								</div>
								@if ($errors->has('email'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('email') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-lock-outline"></i>
										</span>
									</div>
									<input type="password" class="form-control" placeholder="Password" name="password" >
								</div>
								@if ($errors->has('password'))
									<small class="form-text text-muted">
										<strong>{{ $errors->first('password') }}</strong>
									</small>
								@endif
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-lock-outline"></i>
										</span>
									</div>
									<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Username Telegram" name="telegram" value="{{ old('telegram') }}">
								</div>
								@if ($errors->has('telegram'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('telegram') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="mdi mdi-account-outline"></i>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Alamat Lengkap" name="address" value="{{ old('address') }}">
								</div>
								@if ($errors->has('address'))
									<small id="fullnameHelpBlock" class="form-text text-muted">
										<strong>{{ $errors->first('address') }}</strong>
									</small>
								@endif
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary submit-btn">SIGN UP</button>
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
