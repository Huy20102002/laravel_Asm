@extends('admin.layouts.master')
@section('style')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
@endsection
@section('title', 'Thêm Sản Phẩm')
@section('title_content', 'Thêm Sản Phẩm')
@section('content')
    <div class="card">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="p-2">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name">
            </div>
            @if ($errors->has('name'))
                <span class="text-danger"> {{ $errors->first('name') }}</span>
            @endif
            <div class="p-2">
                <label for="">Giá tiền</label>
                <input type="text" class="form-control" name="price">
            </div>
            @if ($errors->has('price'))
                <span class="text-danger"> {{ $errors->first('price') }}</span>
            @endif
            <div class="p-2">
                <label for="">Số lượng</label>
                <input type="number" class="form-control" name="quantity">
            </div>
            @if ($errors->has('quantity'))
                <span class="text-danger"> {{ $errors->first('quantity') }}</span>
            @endif
            <div class="p-2">
                <label for="">Hình ảnh</label>
                <input type="file" name="image[]" multiple class="form-control">
            </div>
            @if ($errors->has('image'))
                <span class="text-danger"> {{ $errors->first('image') }}</span>
            @endif
            <div class="p-2">
                <label for="">Tổng quan</label>
                <textarea name="overview" id="overview"></textarea>
            </div>
            @if ($errors->has('overview'))
                <span class="text-danger"> {{ $errors->first('overview') }}</span>
            @endif
            <div class="p-2">
                <label for="">Mô tả</label>
                <textarea name="description" id="editor"></textarea>
            </div>
            @if ($errors->has('description'))
                <span class="text-danger"> {{ $errors->first('description') }}</span>
            @endif
            <div class="p-2">
                <label for="">Trạng thái</label>
                <div class="mb-3">
                    <label for="">Hoạt động</label>
                    <input type="radio" name="status" value="1" checked>
                    <label for="">Không Hoạt động</label>
                    <input type="radio" name="status" value="0">
                </div>
            </div>
            @if ($errors->has('status'))
            <span class="text-danger"> {{ $errors->first('status') }}</span>
        @endif
            <div class="p-2">
                <label for="">Danh Mục</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($dataCate as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('category_id'))
            <span class="text-danger"> {{ $errors->first('category_id') }}</span>
        @endif
            <div class="p-2">
                <button class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>

@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#overview'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
