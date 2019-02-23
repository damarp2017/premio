<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/2/2019
 * Time: 6:37 PM
 */
?>

@extends('lecturer.layouts.app')

@section('title')
    Home
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
                <li class="breadcrumb-item"><a href="{{ route('premio') }}">Premio</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4 class="card-title">Newest Achievements</h4>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset('material-pro/assets/images/users/1.jpg') }}" alt="user" />
                        <div class="el-overlay scrl-up">
                            <ul class="el-info">
                                <li>
                                    <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('material-pro/assets/images/users/1.jpg') }}">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:void(0);">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Genelia Deshmukh</h3>
                        <small>Managing Director</small>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset('material-pro/assets/images/users/2.jpg') }}" alt="user" />
                        <div class="el-overlay scrl-up">
                            <ul class="el-info">
                                <li>
                                    <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('material-pro/assets/images/users/2.jpg') }}">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:void(0);">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Genelia Deshmukh</h3>
                        <small>Managing Director</small>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset('material-pro/assets/images/users/3.jpg') }}" alt="user" />
                        <div class="el-overlay scrl-up">
                            <ul class="el-info">
                                <li>
                                    <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('material-pro/assets/images/users/3.jpg') }}">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:void(0);">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Genelia Deshmukh</h3>
                        <small>Managing Director</small>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset('material-pro/assets/images/users/4.jpg') }}" alt="user" />
                        <div class="el-overlay scrl-up">
                            <ul class="el-info">
                                <li>
                                    <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('material-pro/assets/images/users/4.jpg') }}">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline" href="javascript:void(0);">
                                        <i class="icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Genelia Deshmukh</h3>
                        <small>Managing Director</small>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection