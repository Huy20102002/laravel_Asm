@extends('admin.layouts.master')
@section('title','Màu sắc')
@section('title_content','Màu sắc')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Size....">

            </div>
        </div>
        <div>
            <a href="{{ route('admin.color.add') }}" class="btn btn-primary">Thêm màu sắc</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width='100%' cellspacing="0">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên Size</th>
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
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection