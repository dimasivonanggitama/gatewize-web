@extends('auth.app')

@section('pageTitle', 'Login')

@section('content')

<div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-human-child"></i>
                            </span>
                        </div>
                    </div>
                    @if ($errors->has('username'))
                        <small id="usernameHelpBlock" class="form-text text-muted">
                            <strong>{{ $errors->first('username') }}</strong>
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="*********" value="{{ old('username') }}" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-key"></i>
                            </span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <small id="usernameHelpBlock" class="form-text text-muted">
                            <strong>{{ $errors->first('password') }}</strong>
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Keep me signed in
                    </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Not a member ?</span>
                    <a href="{{ route('register') }}" class="text-black text-small">Create new account</a>
                </div>
                </form>
            </div>
            <ul class="auth-footer">
                <li>
                <a href="#">Conditions</a>
                </li>
                <li>
                <a href="#">Help</a>
                </li>
                <li>
                <a href="#">Terms</a>
                </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Gatewize. All rights reserved.</p>
        </div>
    </div>
</div>

@endsection