<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/2/2019
 * Time: 6:37 PM
 */
?>


@extends('admin.layouts.app')

@section('title')
    Home
@endsection

@section('this-page-style')
    <!-- Popup CSS -->
    <link href="{{ asset('material-pro/assets/plugins/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">
@endsection

@section('this-page-scripts')
    <script src="{{ asset('material-pro/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Home</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <b><a href="{{ route('premio') }}" class=" text-danger">Premio</a></b>
                </li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <a href="#">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-info">
                                <i class="mdi mdi-account-outline"></i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-light">{{ $total['admin'] }}</h3>
                                <h5 class="text-muted m-b-0">Administrator</h5></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-warning">
                            <i class="mdi mdi-account-outline"></i>
                        </div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">{{ $total['lecturer'] }}</h3>
                            <h5 class="text-muted m-b-0">Lecturers</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-danger">
                            <i class="mdi mdi-account-outline"></i>
                        </div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">{{ $total['student'] }}</h3>
                            <h5 class="text-muted m-b-0">Students</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-success">
                            <i class="mdi mdi-thumb-up"></i>
                        </div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">30</h3>
                            <h5 class="text-muted m-b-0">Achievements</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4 class="card-title">Newest Achievements</h4>
        </div>
        @foreach($achievements as $achievement)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('images/' . $achievement->certificate) }}" alt="Card image cap" height="300">
                    <div class="card-body">
                        <h4 class="card-title">{{ $achievement->place_of_competition }}</h4>
                        <p class="card-text">{{ $achievement->nim }}</p>
                        <p class="card-text">{{ $achievement->achievement }}</p>
                        <p class="card-text">{{ $achievement->prize }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Uploaded at
                        <br>
                        <small>{{ \Carbon\Carbon::parse($achievement->created_at)->format('D, d M Y')}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12">
            {{ $achievements->links() }}
        </div>
    </div>
@endsection