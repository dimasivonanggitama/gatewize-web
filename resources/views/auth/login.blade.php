<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }} | Login</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/vendors/css/vendor.bundle.base.css') !!}">
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/vendors/css/vendor.bundle.addons.css') !!}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! asset('theme/StarAdmin/css/style.css') !!}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{!! asset('theme/StarAdmin/images/favicon.png') !!}" />
</head>

<body>
    <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
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
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{!! asset('theme/StarAdmin/vendors/js/vendor.bundle.base.js') !!}"></script>
    <script src="{!! asset('theme/StarAdmin/vendors/js/vendor.bundle.addons.js') !!}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{!! asset('theme/StarAdmin/js/off-canvas.js') !!}"></script>
    <script src="{!! asset('theme/StarAdmin/js/misc.js') !!}"></script>
    <!-- endinject -->
</body>

</html>