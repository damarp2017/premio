<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/23/2019
 * Time: 4:21 PM
 */
?>
@extends('admin.layouts.app')

@section('title')
    My Profile
@endsection

@section('this-page-style')
    <link rel="stylesheet" href="{{ asset('material-pro/assets/plugins/dropify/dist/css/dropify.min.css') }}">
    <link href="{{ asset('material-pro/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
          rel="stylesheet">
    <link href="{{ asset('material-pro/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('material-pro/assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css') }}"
          rel="stylesheet">
    <link href="{{ asset('material-pro/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('material-pro/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('material-pro/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}"
          rel="stylesheet">
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">My Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('premio') }}" class="text-danger">Premio</a></li>
                <li class="breadcrumb-item active">My Profile</li>
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
    @if($message = Session::get('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-20">
                        <img src="{{ asset('images/' . Auth::user()->image) }}" width="150"
                             height="auto"/>
                        <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                        <hr>
                    </center>
                    <small class="text-muted">Email address</small>
                    <h6>{{ Auth::user()->email }}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <form action="{{ route('admin.update-my-profile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="card-body">
                                                <input data-default-file="{{ asset('images/'.Auth::user()->image) }}"
                                                       type="file" name="image" id="input-file-now" class="dropify"
                                                       data-max-file-size="2M"/>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input name="name" required type="text" class="form-control"
                                                           placeholder="Enter name" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" required name="email" class="form-control"
                                                           placeholder="Enter email" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input name="password" type="password" class="form-control"
                                                           placeholder="Enter new password">
                                                    <small class="form-control-feedback text-success">*Keep blank if you don't want to change with the new password</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-check"></i> Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('this-page-script')
    <script src="{{ asset('material-pro/assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('material-pro/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script>
        // MAterial Date picker
        $('#mdate').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });


    </script>
    <script src="{{ asset('material-pro/assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
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
