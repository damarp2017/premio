<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/2/2019
 * Time: 7:29 PM
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
    <link rel="icon" type="image/png" sizes="16x16"
          href="{{ asset('material-pro/assets/images/premio-favicon.png') }}">
    <title>Premio | Student | @yield('title')</title>
    @include('user.layouts.partials.style')
    @yield('this-page-style')
</head>
<body class="fix-header card-no-border">

<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<div id="main-wrapper">
    @include('user.layouts.partials.header')
    @include('user.layouts.partials.sidebar')
    <div class="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
        @include('user.layouts.partials.footer')
    </div>
</div>
@include('user.layouts.partials.script')
@yield('this-page-script')
</body>
</html>