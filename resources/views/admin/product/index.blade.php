@extends('admin.layouts.master')
@section('title', 'Sản Phẩm')
@section('title_content', 'Danh Sách Sản Phẩm')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Products....">

                    </div>
                </div>
                <div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
                </div>
            </div>
            <div class="mt-3">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width='100%' cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Danh Mục</th>
                            <th>Image</th>
                            <th>Khác</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status ? 'Hoạt động' : 'Không hoạt động' }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <img src=" {{ asset($product->image) }}" width="150" alt="">
                                </td>

                                <td class="">
                                    <div class="d-flex">
                                        <div class="m-2">
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                                        </div>
                                        <div class="m-2">
                                            <form action="{{ route('admin.products.delete', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
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
        <div class="modal-dialog" style="max-width:1000px" id="formUser">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin sản phẩm</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="mb-3">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" value="" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Giá tiền</label>
                            <input type="text" value="" id="price" class="form-control">

                        </div>
                        <div class="mb-3">
                            <label for="">Hình ảnh</label>
                            <input type="file" value="" class="form-control">
                            <div class="mb-3">
                                <img src="" id="image" width="150 " alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Tổng quan</label>
                            <div id="overview">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Mô tả</label>
                            <div id="description">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Số lượng</label>
                            <input type="text" value="" id="quantity" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Trạng thái</label>
                            <div class="mb-3">
                                <label for="">Hoạt động</label>
                                <input type="radio" name="status" id="status" value="1" checked>
                                <label for="">Không Hoạt động</label>
                                <input type="radio" name="status" id="status" value="0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Danh mục</label>
                            <select name="" id="category_id" class="category_id form-control">
                            </select>
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
