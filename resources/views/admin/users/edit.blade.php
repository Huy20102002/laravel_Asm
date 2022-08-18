@extends('admin.layouts.master')
@section('title', 'Chỉnh sửa người dùng')
@section('title_content', 'Chỉnh sửa người dùng')
@section('content')
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Tên người dùng</label>
            <input type="text" value="{{ $user->name }}" name="name" class="form-control">
        </div>
        @if ($errors->has('name'))
            <span class="text-danger">
                {{ $errors->first('name') }}
            </span>
        @endif
        <div class="mb-3">
            <label for="">Năm Sinh</label>
            <input type="date" value="{{date("Y-m-d", strtotime($user->birtday))}}" name="birtday" class="form-control">
        </div>
        @if ($errors->has('date'))
          <span class="text-danger">
            {{ $errors->first('date') }}
          </span>
        @endif
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" value="{{ $user->email }}" name="email" class="form-control">
        </div>
        @if ($errors->has('email'))
           <span class="text-danger">
            {{ $errors->first('email') }}
           </span>
        @endif
        <div class="mb-3">
            <label for="">Phone number</label>
            <input type="text" value="{{ $user->phone == null ? '' : $user->phone }}" name="phone"
                class="form-control">
        </div>
        @if ($errors->has('phone'))
            <span class="text-danger">
                {{ $errors->first('phone') }}
            </span>
        @endif
        <div class="mb-3">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        @if($user->image)
          <label for="">Ảnh cũ</label>
          <br>  
          <img src="{{asset($user->image)}}" class="img-fluid" width="100" alt="">
        @endif
        @if ($errors->has('image'))
            <span class="text-danger">
                {{ $errors->first('image') }}
            </span>
        @endif
        @if($user->role != 2)
        <div class="mb-3">
            <label for="">Trạng thái</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="1"
                    @checked($user->status == 1)>
                <label class="form-check-label" for="status1">
                    Hoạt động
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="0"
                    @checked($user->status == 0)>
                <label class="form-check-label" for="status2">
                    Không hoạt động
                </label>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1"
                    @checked($user->role == 1) value="1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Khách Hàng
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2"
                    @checked($user->role == 3) value="3">
                <label class="form-check-label" for="flexRadioDefault2">
                    Nhân viên
                </label>
            </div>
        </div>
        @endif
        <div class="mb-3">
            <button class="btn btn-sm btn-primary" type="submit">Lưu</button>
        </div>
    </form>
@endsection
