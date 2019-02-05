<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/3/2019
 * Time: 3:30 PM
 */
?>
@extends('admin.layouts.app')

@section('title')
    {{ __('Lecturer User') }}
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Lecturer Users</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <b><a href="{{ route('premio') }}" class=" text-danger">Premio</a></b>
                </li>
                <li class="breadcrumb-item">
                    <b>Users</b>
                </li>
                <li class="breadcrumb-item active">Lecturer</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <a href="{{ route('admin.create-user-lecturer') }}" class="btn btn-outline-info btn-sm"><i class="ti-plus"></i>&ensp;Create New</a>
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
                                <th>NIPY</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $number = 1;
                            @endphp
                            @foreach($lecturers as $lecturer)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $lecturer->nipy }}</td>
                                    <td>
                                        <center>
                                            <img src="{{ asset('images/' . $lecturer->image) }}" alt="admin-user" height="40">
                                        </center>
                                    </td>
                                    <td>{{ $lecturer->name }}</td>
                                    <td>{{ $lecturer->email }}</td>
                                    <td>
                                        <center>
                                            <a href="{{ route('admin.edit-user-lecturer', $lecturer->id) }}"
                                               class="btn btn-outline-warning btn-xs">
                                                <i class="ti-pencil"></i>
                                                &ensp;Update
                                            </a>
                                            <a href="#" class="btn btn-outline-danger btn-xs" data-toggle="modal"
                                               data-target="#deleteModal{{ $lecturer->id }}">
                                                <i class="ti-close"></i>
                                                &ensp;Remove
                                            </a>
                                        </center>
                                        <div class="modal fade" id="deleteModal{{ $lecturer->id }}" tabindex="-1"
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
                                                        <form action="{{ route('admin.destroy-user-lecturer', $lecturer->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <p>Are you sure to remove "<b class="text-danger">{{ $lecturer->name }}</b>" ?
                                                            </p>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-success btn-sm"
                                                                        data-dismiss="modal">
                                                                    <i class="fa fa-close"></i>&ensp;No, go back
                                                                </button>
                                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                                    <i class="fa fa-check"></i>&ensp;Yes, remove this record
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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