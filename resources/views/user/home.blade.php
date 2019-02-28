<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/2/2019
 * Time: 6:37 PM
 */
?>

@extends('user.layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Home</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Premio</a></li>
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
                            <h6 class="mt-0 mb-0">{{ $achievement->name }}</h6>
                            <p class="mt-0 mb-0">
                                <small>{{ $achievement->team_name }}</small>
                            </p>
                            <p class="mt-0 mb-0">
                                <small>{{ $achievement->competition }}</small>
                            </p>
                            <p class="mt-0 mb-0">
                                <small>{{ $achievement->place_of_competition }}</small>
                            </p>
                            <p class="mt-0 mb-0">
                                <small>{{ $achievement->achievement }}</small>
                            </p>
                            <p class="mt-0 mb-0">
                                <small>{{ $achievement->prize }}</small>
                            </p>
                            <hr>
                            <small class="text-muted">{{ $achievement->created_at->format('l, d F Y') }}</small>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
        <div class="col-md-12">
            {{ $achievements->links() }}
        </div>
    </div>
@endsection