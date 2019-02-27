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
                <li class="breadcrumb-item active">Home</li>
            </ol>
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