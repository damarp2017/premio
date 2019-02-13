<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/7/2019
 * Time: 9:19 AM
 */
?>
@extends('admin.layouts.app')

@section('title')
    {{ __('Student') }}
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Student</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <b><a href="{{ route('premio') }}" class=" text-danger">Premio</a></b>
                </li>
                <li class="breadcrumb-item active">Student</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <a href="{{ route('admin.create-user-student') }}" class="btn btn-outline-info btn-sm">
                    <i class="ti-plus"></i>&ensp;Create New</a>
            </div>
        </div>
    </div>

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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-0">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $number = 1;
                            @endphp

                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $student->nim }}</td>
                                    <td>
                                        <center>
                                            <img src="{{ asset('images/'. $student->image) }}" alt="student-user" height="40">
                                        </center>
                                    </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td><a href="#" data-toggle="tooltip" data-original-title="Click for more details">More Details</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('this-page-script')
    <script src="{{ asset('material-pro/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection

