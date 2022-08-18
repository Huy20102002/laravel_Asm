@extends('admin.layouts.master')
@section('title', 'Danh sách User')
@section('title_content', 'Danh Sách User')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search User....">

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
                            <th>birtday</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="col-2">Orther</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->birtday }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <img src="{{ asset($user->image) }}" width="100" alt="">
                                </td>
                                <td>
                                    @if ($user->status == 1)
                                        Hoạt động
                                    @else
                                        Tạm khóa
                                    @endif
                                </td>
                                <td class="">

                                    <div class="d-flex">
                                        <div class="m-2">
                                            <a class="btn btn-primary" href="{{ route('admin.users.show', $user->id) }}"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </div>
                                        @if ($user->role != 2)
                                            <div class="m-2">
                                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @if($user->status ==0)
                                                    <input type="hidden" value="1" name="status">
                                                    <button class="btn btn-danger"><i class="fas fa-lock"></i></button>
                                                    @else
                                                    <input type="hidden" value="0" name="status">
                                                    <button class="btn btn-danger"><i class="fas fa-lock-open"></i></button>
                                                    @endif
                                                </form>
                                            </div>
                                    </div>
                        @endif
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="2" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin người dùng</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="form" id="formUser">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
