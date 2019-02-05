<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/3/2019
 * Time: 10:59 AM
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
    <title>Premio | Student Login</title>
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

<section id="wrapper">
    <div class="login-register" style="background-image:url({{ asset('material-pro/assets/images/background/lock.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="{{ route('password.email') }}" method="POST">
                    <h3 class="box-title m-b-20">Recover Password</h3>
                    @if(session('status'))
                        <div class="alert alert-success"><small>{{ session('status') }}</small></div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="email" value="{{ old('email') }}" class="form-control" type="text" required="" placeholder="Email">
                            @if($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light btn-md" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
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

