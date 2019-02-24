<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/25/2019
 * Time: 5:16 AM
 */
?>
@extends('user.layouts.app')

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
                        <h6 class="card-subtitle">{{ Auth::user()->gender }}</h6>
                        <h6 class="card-subtitle">{{ Auth::user()->nim }}</h6>
                        <hr>
                    </center>
                    <small class="text-muted">Email address</small>
                    <h6>{{ Auth::user()->email }}</h6>
                    <small class="text-muted">Phone</small>
                    <h6>@if(Auth::user()->phone) {{ Auth::user()->phone }} @else <i class="text-danger">Not set</i> @endif</h6>
                    <small class="text-muted">Blood Type</small>
                    <h6>@if(Auth::user()->blood_type) {{ Auth::user()->blood_type }} @else <i class="text-danger">Not
                            set</i> @endif</h6>
                    <small class="text-muted">Place of Birth</small>
                    <h6>@if(Auth::user()->place_of_birth) {{ Auth::user()->place_of_birth }} @else <i class="text-danger">Not
                            set</i> @endif</h6>
                    <small class="text-muted">Date of Birth</small>
                    <h6>@if(Auth::user()->date_of_birth) {{ Auth::user()->date_of_birth }} @else <i class="text-danger">Not
                            set</i> @endif</h6>
                    <small class="text-muted">Religion</small>
                    <h6>@if(Auth::user()->religion) {{ Auth::user()->religion }} @else <i class="text-danger">Not set</i> @endif
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <form action="{{ route('update-my-profile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="card-body">
                                                <input data-default-file="{{ asset('images/' . Auth::user()->image) }}"
                                                       type="file" name="image" id="input-file-now" class="dropify"
                                                       data-max-file-size="2M"/>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">NIM</label>
                                                    <input name="nim" type="text" id="nim" class="form-control"
                                                           value="{{ Auth::user()->nim }}" placeholder="Enter NIM">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input name="name" type="text" class="form-control"
                                                           placeholder="Enter name" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Place of Birth</label>
                                                    <input name="place_of_birth" type="text" class="form-control"
                                                           placeholder="Enter place of birth"
                                                           value="{{ Auth::user()->place_of_birth }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input name="date_of_birth" type="text" class="form-control"
                                                           value="{{ Auth::user()->date_of_birth }}"
                                                           placeholder="Enter date of birth" id="mdate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control custom-select" name="gender">
                                                        <option value="" @if (Auth::user()->gender == null) {{ 'selected' }} @endif >-- Select gender --</option>
                                                        <option value="male" @if (Auth::user()->gender == 'male') {{ 'selected' }} @endif >Male</option>
                                                        <option value="female" @if (Auth::user()->gender == 'female') {{ 'selected' }} @endif >Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Blood Type</label>
                                                    <select name="blood_type" class="form-control custom-select"
                                                            tabindex="1">
                                                        <option value="" @if (Auth::user()->blood_type == null) {{ 'selected' }} @endif >-- Select blood type --</option>
                                                        <option value="O" @if (Auth::user()->blood_type == 'O') {{ 'selected' }} @endif >O</option>
                                                        <option value="A" @if (Auth::user()->blood_type == 'A') {{ 'selected' }} @endif >A</option>
                                                        <option value="B" @if (Auth::user()->blood_type == 'B') {{ 'selected' }} @endif >B</option>
                                                        <option value="AB" @if (Auth::user()->blood_type == 'AB') {{ 'selected' }} @endif >AB</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone</label>
                                                    <input type="text" name="phone" class="form-control"
                                                           value="{{ Auth::user()->phone }}" placeholder="Enter phone">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Religion</label>
                                                    <select name="religion" class="form-control custom-select"
                                                            tabindex="1">
                                                        <option value="" @if (Auth::user()->religion == null) {{ 'selected' }} @endif >-- Select religion --</option>
                                                        <option value="islam" @if (Auth::user()->religion == 'islam') {{ 'selected' }} @endif >Islam</option>
                                                        <option value="katolik" @if (Auth::user()->religion == 'katolik') {{ 'selected' }} @endif >Katolik</option>
                                                        <option value="protestan" @if (Auth::user()->religion == 'protestan') {{ 'selected' }} @endif >Protestan</option>
                                                        <option value="hindu" @if (Auth::user()->religion == 'religion') {{ 'selected' }} @endif >Hindu</option>
                                                        <option value="buddha" @if (Auth::user()->religion == 'buddha') {{ 'selected' }} @endif >Budha</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" name="email" class="form-control"
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
