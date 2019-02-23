<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/4/2019
 * Time: 5:16 PM
 */
?>
@extends('admin.layouts.app')

@section('title')
    Update Admin
@endsection

@section('this-page-style')
    <link rel="stylesheet" href="{{ asset('material-pro/assets/plugins/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('this-page-script')
    <script src="{{ asset('material-pro/assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Forms Update Admin</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <b><a href="{{ route('premio') }}" class=" text-danger">Premio</a></b>
                </li>
                <li class="breadcrumb-item">
                    <b>Users</b>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user-admin') }}">Administrator</a></li>
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
        <div class="col-lg-12">
            <div class="card card-outline-warning">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.update-user-admin', $admin->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    <label for="image">Image</label>
                                    <input name="image" data-default-file="{{ asset('/images/'.$admin->image) }}" type="file" id="image" class="dropify" data-max-file-size="2M"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input name="name" value="{{ $admin->name }}" type="text" id="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input name="email" value="{{ $admin->email }}" type="email" id="email" class="form-control" placeholder="Example@website.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="password">Password</label>
                                        <input name="password" type="password" id="password" class="form-control" placeholder="Enter Password">
                                        <small class="form-control-feedback text-success">*Keep blank if you don't want to change with the new password</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-outline-warning"><i class="fa fa-check"></i> Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection