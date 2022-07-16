@extends('admin.layouts.master')
@section('title', 'Danh sách User')
@section('title_content', 'Danh Sách User')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search User....">
                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width='100%' cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Image</th>
                            <th class="col-2">Orther</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 100; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $i }}</td>
                                <td>{{ $i }}</td>
                                <td>{{ $i }}</td>
                                <td>{{ $i }}</td>
                                <td>{{ $i }}</td>
                                <td class="">
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="fas fa-info-circle"></i></button>
                                    <button class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin người dùng</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <form action="">
                            <div class="mb-3">
                                <label for="">Tên người dùng</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Tên người dùng</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Tên người dùng</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Tên người dùng</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Tên người dùng</label>
                                <input type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
@endsection
