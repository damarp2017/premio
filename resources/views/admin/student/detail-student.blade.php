@extends('admin.layouts.app')

@section('title')
    Student Profile
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
            <h3 class="text-themecolor m-b-0 m-t-0">Student Detail</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('premio') }}" class="text-danger">Premio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.student') }}">Student</a></li>
                <li class="breadcrumb-item active">Detail</li>
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
                        <img src="{{ asset('images/' . $student->image) }}" width="150"
                             height="auto"/>
                        <h4 class="card-title m-t-10">{{ $student->name }}</h4>
                        <h6 class="card-subtitle">{{ $student->gender }}</h6>
                        <h6 class="card-subtitle">{{ $student->nim }}</h6>
                        <hr>
                    </center>
                    <small class="text-muted">Email address</small>
                    <h6>{{ $student->email }}</h6>
                    <small class="text-muted">Phone</small>
                    <h6>@if($student->phone) {{ $student->phone }} @else <i class="text-danger">Not set</i> @endif</h6>
                    <small class="text-muted">Blood Type</small>
                    <h6>@if($student->blood_type) {{ $student->blood_type }} @else <i class="text-danger">Not
                            set</i> @endif</h6>
                    <small class="text-muted">Place of Birth</small>
                    <h6>@if($student->place_of_birth) {{ $student->place_of_birth }} @else <i class="text-danger">Not
                            set</i> @endif</h6>
                    <small class="text-muted">Date of Birth</small>
                    <h6>@if($student->date_of_birth) {{ $student->date_of_birth }} @else <i class="text-danger">Not
                            set</i> @endif</h6>
                    <small class="text-muted">Religion</small>
                    <h6>@if($student->religion) {{ $student->religion }} @else <i class="text-danger">Not set</i> @endif
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
                                <form action="{{ route('admin.update-student', $student->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="card-body">
                                                <input data-default-file="{{ asset('images/'.$student->image) }}"
                                                       type="file" name="image" id="input-file-now" class="dropify"
                                                       data-max-file-size="1M"/>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">NIM</label>
                                                    <input name="nim" type="text" id="nim" class="form-control"
                                                           value="{{ $student->nim }}" placeholder="Enter NIM">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input name="name" type="text" class="form-control"
                                                           placeholder="Enter name" value="{{ $student->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Place of Birth</label>
                                                    <input name="place_of_birth" type="text" class="form-control"
                                                           placeholder="Enter place of birth"
                                                           value="{{ $student->place_of_birth }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input name="date_of_birth" type="text" class="form-control"
                                                           value="{{ $student->date_of_birth }}"
                                                           placeholder="Enter date of birth" id="mdate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control custom-select" name="gender">
                                                        <option value="" @if ($student->gender == null) {{ 'selected' }} @endif >-- Select gender --</option>
                                                        <option value="male" @if ($student->gender == 'male') {{ 'selected' }} @endif >Male</option>
                                                        <option value="female" @if ($student->gender == 'female') {{ 'selected' }} @endif >Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Blood Type</label>
                                                    <select name="blood_type" class="form-control custom-select"
                                                            tabindex="1">
                                                        <option value="" @if ($student->blood_type == null) {{ 'selected' }} @endif >-- Select blood type --</option>
                                                        <option value="O" @if ($student->blood_type == 'O') {{ 'selected' }} @endif >O</option>
                                                        <option value="A" @if ($student->blood_type == 'A') {{ 'selected' }} @endif >A</option>
                                                        <option value="B" @if ($student->blood_type == 'B') {{ 'selected' }} @endif >B</option>
                                                        <option value="AB" @if ($student->blood_type == 'AB') {{ 'selected' }} @endif >AB</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                           placeholder="Enter email" value="{{ $student->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Religion</label>
                                                    <select name="religion" class="form-control custom-select"
                                                            tabindex="1">
                                                        <option value="" @if ($student->religion == null) {{ 'selected' }} @endif >-- Select religion --</option>
                                                        <option value="islam" @if ($student->religion == 'islam') {{ 'selected' }} @endif >Islam</option>
                                                        <option value="katolik" @if ($student->religion == 'katolik') {{ 'selected' }} @endif >Katolik</option>
                                                        <option value="protestan" @if ($student->religion == 'protestan') {{ 'selected' }} @endif >Protestan</option>
                                                        <option value="hindu" @if ($student->religion == 'religion') {{ 'selected' }} @endif >Hindu</option>
                                                        <option value="buddha" @if ($student->religion == 'buddha') {{ 'selected' }} @endif >Budha</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone</label>
                                                    <input type="text" name="phone" class="form-control"
                                                           value="{{ $student->phone }}" placeholder="Enter phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-check"></i> Save Changes</button>
                                        <a href="#" class="btn btn-outline-danger pull-right" data-toggle="modal"
                                           data-target="#deleteModal{{$student->id}}">
                                            <i class="ti-close"></i>
                                            &ensp;Remove this record
                                        </a>
                                    </div>
                                </form>
                                <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger" id="exampleModalLabel1">
                                                    <b>WARNING !!!</b>
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.destroy-user-student', $student->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>
                                                        Are you sure to remove "<b class="text-danger">{{ $student->name }}</b>"
                                                        ?
                                                    </p>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                                class="btn btn-outline-success btn-sm"
                                                                data-dismiss="modal">
                                                            <i class="fa fa-close"></i>&ensp;No, go back
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-outline-danger btn-sm">
                                                            <i class="fa fa-check"></i>&ensp;Yes, remove this
                                                            record
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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