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
            <a href="{{ route('admin.user-admin') }}" data-toggle="tooltip"
               data-original-title="Click for more details">
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
            <a href="{{ route('admin.user-lecturer') }}" data-toggle="tooltip"
               data-original-title="Click for more details">
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
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('admin.student') }}" data-toggle="tooltip"
               data-original-title="Click for more details">
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
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('admin.achievement') }}" data-toggle="tooltip"
               data-original-title="Click for more details">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-success">
                                <i class="mdi mdi-thumb-up"></i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">{{ $total['achievement'] }}</h3>
                                <h5 class="text-muted m-b-0">Achievements</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
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