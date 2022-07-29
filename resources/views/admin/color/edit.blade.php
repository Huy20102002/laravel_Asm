@extends('admin.layouts.master')
@section('title','Sửa màu sắc')
@section('title_content','Sửa màu sắc')
@section('content')
<div class="form-categories">
    <form action="{{ route('admin.color.update',$data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Tên color</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
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
                <input type="radio" name="status" value="1" checked>
                <label for="">Không Hoạt động</label>
                <input type="radio" name="status" value="0">
            </div>


        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
@endsection