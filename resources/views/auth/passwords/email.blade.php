@extends('auth.app')

@section('pageTitle', 'Forgot Password')

@section('content')
	<div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
		<div class="row w-100">
			<div class="col-lg-6 mx-auto">
				<h2 class="text-center">Forgot Password</h2>
				
				<div class="auto-form-wrapper border border-secondary">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif
					<form method="POST" action="{{ route('password.email') }}">
						@csrf
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>
							<div class="col-md-6">
								<input aria-describedby="help_email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
								<small id="help_email" class="form-text text-muted text-center">Untuk pengiriman link reset password</small>
								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-5 offset-md-4">
								<div class="row">
									<div class="mx-auto">	
										<button type="submit" class="btn btn-primary">
											{{ __('Send') }}
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
@endsection
