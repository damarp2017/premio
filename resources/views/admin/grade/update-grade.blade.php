<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 5/9/2019
 * Time: 7:38 AM
 */
?>
@extends('admin.layouts.app')

@section('title')
    Edit Grade
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Form Update Grades</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <b><a href="{{ route('premio') }}" class=" text-danger">Premio</a></b>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.grade') }}">Grades</a>
                </li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.update-grade', $grade->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Grade Name</label>
                                        <input value="{{ $grade->grade_name }}" name="grade_name" required type="text" id="name" class="form-control" placeholder="Enter Grade Name" maxlength="2" minlength="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-outline-warning"><i class="fa fa-check"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection