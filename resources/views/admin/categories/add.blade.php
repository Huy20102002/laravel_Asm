@extends('admin.layouts.master')
@section('title', 'Thêm Danh Mục')
@section('title_content', 'Thêm Danh Mục')
@section('content')
    <div class="form-categories">
        <form action="{{ route('admin.cate.save-add') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                @if ($errors->has('name'))
                    <span class="text-danger"> {{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Trạng thái</label>
                <div class="mb-3">
                    <label for="">Hoạt động</label>
                    <input type="radio" name="status" value="{{ $presently }}" checked>
                    <label for="">Không Hoạt động</label>
                    <input type="radio" name="status" value="{{ $hide }}">
                </div>
                @if ($errors->has('status'))
                    <span class="text-danger"> {{ $errors->first('status') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
@endsection
