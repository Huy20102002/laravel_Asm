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
            <div>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Thêm người dùng</a>
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
                        @foreach ($data as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->image }}</td>
                                <td class="">
                                    <div class="d-flex">
                                        <div class="m-2">
                                            <button onclick="getId('{{ $user->id }}')" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="fas fa-info-circle"></i></button>
                                        </div>
                                        <div class="m-2">
                                            <form action="{{route('admin.users.delete',$user->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin người dùng</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <form action="" id="formUser">

                            <div class="mb-3">
                                <label for="">Tên người dùng</label>
                                <input type="text" value="${data.name}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Sinh năm</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Phone number</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control">
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
@section('script')
    <script>
        function getRequest(url) {
            return fetch(url, {
                    method: "GET",
                    headers: new Headers({
                        "Content-Type": "application/json"
                    })
                })
                .then(response => response.json());
        }
        const getId = async (id) => {
            const url = `http://localhost:8000/admin/users/show/${id}`;
            const {data} = await getRequest(url);
            document.getElementById("formUser").innerHTML = ` <div class="mb-3">
                                  <label for="">Tên người dùng</label>
                                  <input type="text" value="${data.name}" class="form-control">
                              </div>
                              <div class="mb-3">
                                  <label for="">Tuổi</label>
                                  <input type="text" value="${data.age}" class="form-control">
                              </div>
                              <div class="mb-3">
                                  <label for="">Email</label>
                                  <input type="email" value="${data.email}" class="form-control">
                              </div>
                              <div class="mb-3">
                                  <label for="">Phone number</label>
                                  <input type="text" value="${data.phone}" class="form-control">
                              </div>
                              <div class="mb-3">
                                  <label for="">Image</label>
                                  <input type="file" class="form-control">
                              </div>`;

        };
          
    </script>
@endsection
