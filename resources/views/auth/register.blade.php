@extends('auth.app')

@section('pageTitle', 'Register')

@section('content')
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <h2 class="text-center mb-4">Register</h2>                    
                <div class="auto-form-wrapper">
                    <form action="{{ route("register") }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Fullname" name="fullname" value="{{ old('fullname') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('fullname'))
                                <small id="fullnameHelpBlock" class="form-text text-muted">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
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
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="E-mail address" name="email" value="{{ old('email') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <small id="emailHelpBlock" class="form-text text-muted">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" >
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <small class="form-text text-muted">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Telegram Id" name="telegram" value="{{ old('telegram') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('telegram'))
                                <small id="telegramHelpBlock" class="form-text text-muted">
                                    <strong>{{ $errors->first('telegram') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('address'))
                                <small id="addressHelpBlock" class="form-text text-muted">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked> I agree to the terms
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary submit-btn btn-block" type="submit">Register</button>
                        </div>
                        <div class="text-block text-center my-3">
                            <span class="text-small font-weight-semibold">Already have and account ?</span>
                            <a href="{{ route("login") }}" class="text-black text-small">Login</a>
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