@extends('admin.layouts.master')
@section('title', 'Danh Mục')
@section('title_content', 'Danh Sách Danh Mục')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search User....">

                </div>
            </div>
            <div>
                <a href="{{ route('admin.cate.add') }}" class="btn btn-primary">Thêm Danh Mục</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width='100%' cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên Danh Mục</th>
                            <th>Trạng Thái</th>
                            <th>Khác</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $cate)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $cate->name }}</td>
                                <td>{{ $cate->status ? 'Hoạt động' : 'Không hoạt động' }}</td>

                                <td class="">
                                    <div class="d-flex">
                                        <div class="m-2">
                                            <button onclick="getData('{{ $cate->id }}')" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="fas fa-info-circle"></i></button>
                                        </div>
                                        <div class="m-2">
                                            <form action="{{ route('admin.cate.delete', $cate->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="deleteInformation('{{ $cate}}')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
        <div class="modal-dialog" id="formUser">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin danh mục</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="mb-3">
                            <label for="">Tên danh mục</label>
                            <input type="text" value="" id="nameCate" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Trạng thái</label>
                            <div class="mb-3">
                                <label for="">Hoạt động</label>
                                <input type="radio" name="status" value="1" checked>
                                <label for="">Không Hoạt động</label>
                                <input type="radio" name="status" value="0">
                            </div>
                        </div>
                        <input type="hidden" value="" id="id">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" onclick="update()" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const getData = (id) => {
            $.ajax({
                url: `http://localhost:8000/admin/categories/show/${id}`,
                method: "GET",
                success: function(value) {
                    const {
                        data
                    } = value;
                    $("#nameCate").val(data.name);
                    $("#status").val(data.status);
                    $("#id").val(data.id);
                }
            })
        };
        const update = () => {

            let name = $("#nameCate").val();
            let status = $("#status").val();
            let id = $("#id").val();
            $.ajax({
                url: `http://localhost:8000/admin/categories/apiupdate/${id}`,
                method: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: name,
                    status: status,
                    id: id
                },
                success: function(response) {
                    window.location = "http://localhost:8000/admin/categories";
                },
                error: function(error) {
                    const {
                        message
                    } = error.responseJSON
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${message}`,
                    })

                }
            })
        };
  
    </script>
@endsection
