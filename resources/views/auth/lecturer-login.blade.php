<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/3/2019
 * Time: 11:53 AM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/3/2019
 * Time: 11:42 AM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/3/2019
 * Time: 9:44 AM
 */
?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('material-pro/assets/images/premio-favicon.png') }}">
    <title>Premio | Lecturer Login</title>
    <link href="{{ asset('material-pro/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('material-pro/material/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('material-pro/material/css/colors/red.css') }}" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<section id="wrapper" class="login-register login-sidebar"  style="background-image:url({{ asset('material-pro/assets/images/background/lock.jpg') }});">
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" id="loginform" action="{{ route('lecturer.login.submit') }}" method="POST">
                @csrf
                <p class="text-center text-info">Lecturer Login</p>
                <a href="{{ route('premio') }}" class="text-center db">
                    <img src="{{ asset('material-pro/assets/images/premio-logo.png') }}" alt="Home" />
                    <br/>
                    <img src="{{ asset('material-pro/assets/images/premio-text.png') }}" alt="Home" />
                </a>
                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input name="email" id="email" class="form-control" type="text" required="" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @if($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password" id="password" class="form-control" type="password" required="" placeholder="Password">
                    </div>
                    @if($errors->has('password'))
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input name="remember" id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="{{ route('lecturer.password.request') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="{{ asset('material-pro/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('material-pro/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('material-pro/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('material-pro/material/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('material-pro/material/js/waves.js') }}"></script>
<script src="{{ asset('material-pro/material/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('material-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('material-pro/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('material-pro/material/js/custom.min.js') }}"></script>
</body>

</html>


