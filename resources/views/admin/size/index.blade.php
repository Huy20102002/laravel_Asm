@extends('admin.layouts.master')
@section('title','Kích Thước')
@section('title_content','Kích Thước')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Size....">

            </div>
        </div>
        <div>
            <a href="{{ route('admin.size.add') }}" class="btn btn-primary">Thêm kích thước</a>
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
                    @foreach ($data as $index => $size)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $size->name }}</td>
                            <td>{{ $size->status ? 'Hoạt động' : 'Không hoạt động' }}</td>

                            <td class="">
                                <div class="d-flex">
                                    <div class="m-2">
                                       <a href="" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    </div>
                                    <div class="m-2">
                                        <form action="{{ route('admin.size.destroy', $size->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button  class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
@endsection