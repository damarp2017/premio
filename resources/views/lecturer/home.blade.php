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
            <div class="col-md-4">
                <ul class="list-unstyled">
                    <li class="media">
                        <img class="d-flex mr-3" src="{{ asset('images/' . $achievement->certificate) }}" width="60"
                             alt="Achievements">
                        <div class="media-body">
                            <h4 class="mt-0 mb-2 text-danger">{{ \Illuminate\Support\Str::title($achievement->achievement) }}</h4>
                            <h6 class="mt-0 mb-2">{{ $achievement->name }} <span class="mdi @if($achievement->gender == 'male') : {{ 'mdi-gender-male text-info' }} @else {{ 'mdi-gender-female text-danger' }} @endif"></span></h6>
                            <p class="mt-0 mb-0">
                                <small>Team Name : {{ $achievement->team_name }}</small>
                            </p>
                            <p class="mt-0 mb-0">
                                <small>Competition : {{ $achievement->competition }}</small>
                            </p>
                            <p class="mt-0 mb-0">
                                <small>Place : {{ $achievement->place_of_competition }}</small>
                            </p>
                            <p class="mt-0 mb-0">
                                <small>Rp. {{ number_format($achievement->prize, 0, '.', ',') }}</small>
                            </p>
                            <hr>
                            <small class="text-muted mt-0 mb-0">Uploaded at</small>
                            <p><small class="text-muted mt-0 mb-0">{{ \Carbon\Carbon::parse($achievement->created_at)->format('l, d F Y')}}</small></p>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
        <div class="col-md-12 d-flex justify-content-center">
            {{ $achievements->links() }}
        </div>
    </div>
@endsection