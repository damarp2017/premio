<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/24/2019
 * Time: 6:39 PM
 */
?>
@extends('user.layouts.app')

@section('title')
    My Achievement
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
            <h3 class="text-themecolor m-b-0 m-t-0">Home</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Premio</a></li>
                <li class="breadcrumb-item active">My Achievement</li>
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
    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4 class="card-title">Your Achievements</h4>
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
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">Upload New Achievements</h4>
        </div>
        <div class="col-lg-12">
            <div class="card card-outline-danger">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('store-my-achievement') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h4 class="card-title">Certificate</h4>
                                    <input data-max-file-size="2M" name="image" required type="file" id="input-file-now"
                                           class="dropify"/>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Competition</label>
                                        <input name="competition" required type="text" id="competition"
                                               class="form-control" placeholder="Enter Competition">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Place of Competition</label>
                                        <input name="place_of_competition" required type="text" id="place_of_competition"
                                               class="form-control form-control-danger"
                                               placeholder="Enter Place of Competition">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Achievement</label>
                                        <select name="achievement" class="form-control custom-select"
                                                data-placeholder="Choose a Category" tabindex="1">
                                            <option value="third place">Third Place</option>
                                            <option value="runner up">Runner Up</option>
                                            <option value="winner">Winner</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date</label>
                                        <input name="date_of_competition" type="text" required class="form-control"
                                               placeholder="Choose Date" id="mdate">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Team Name</label>
                                        <input name="team_name" required type="text" id="competition"
                                               class="form-control" placeholder="Enter Team Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Prize</label>
                                        <input name="prize" required type="text" id="prize" class="form-control"
                                               placeholder="Enter Prize">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                        </div>
                    </form>
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
        $(document).ready(function() {
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
