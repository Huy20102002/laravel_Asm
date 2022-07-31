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
    <link rel="stylesheet" href="{{ asset('css/products/select_size.css') }}">
@endsection
@section('title', 'Chỉnh Sửa Sản Phẩm')
@section('title_content', 'Chỉnh Sửa Sản Phẩm')
@section('content')
    <div class="card">
        <form action="{{ route('admin.products.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="p-2">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" name="name">
                    </div>
                    @if ($errors->has('name'))
                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                    @endif
                    <div class="p-2">
                        <label for="">Giá tiền</label>
                        <input type="text" class="form-control" value="{{ $data->price }}" name="price">
                    </div>
                    @if ($errors->has('price'))
                        <span class="text-danger"> {{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="p-2">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" value="{{ $data->quantity }}" name="quantity">
                    </div>
                    @if ($errors->has('quantity'))
                        <span class="text-danger"> {{ $errors->first('quantity') }}</span>
                    @endif
                    <div class="p-2 d-flex justify-content-between">
                         <div class="">
                            <label for="">Hình ảnh</label>
                            <input type="file"  name="thumb_img" class="form-control">
                         </div>
                        <div class="ml-2">
                            <img src="{{ asset($data->image) }}" width="150" alt="">
                            <input type="hidden" value="{{$data->image}}" name="image" class="form-control">
                        </div>
                    </div>
              
                    @if ($errors->has('image'))
                        <span class="text-danger"> {{ $errors->first('image') }}</span>
                    @endif
                </div>
            </div>
            <div class="p-2">
                <label for="">Tổng quan</label>
                <textarea name="overview" id="overview">
                    {{ $data->overview }}
                </textarea>
            </div>
            @if ($errors->has('overview'))
                <span class="text-danger"> {{ $errors->first('overview') }}</span>
            @endif
            <div class="p-2">
                <label for="">Mô tả</label>
                <textarea name="description" id="editor">
                    {{ $data->description }}
                </textarea>
            </div>
            @if ($errors->has('description'))
                <span class="text-danger"> {{ $errors->first('description') }}</span>
            @endif
            <div class="p-2">
                <label for="">Trạng thái</label>
                <div class="mb-3">
                    <label for="">Hoạt động</label>
                    <input type="radio" name="status" value="1" {{ $data->status == 1 ? 'checked' : '' }}>
                    <label for="">Không Hoạt động</label>
                    <input type="radio" name="status" value="0" {{ $data->status == 0 ? 'checked' : '' }}>
                </div>
            </div>
            @if ($errors->has('status'))
                <span class="text-danger"> {{ $errors->first('status') }}</span>
            @endif
            <div class="p-2">
                <label for="discount">Giảm giá</label>
                <label for="sale">
                    <input type="checkbox" {{ $data->sale == null ? '' : 'checked' }} name="sale" class="discount p-3"
                        value="1" id="sale">
                </label>
            </div>
            <div class="p-2" id="checkdiscount" style=" {{ $data->sale == null ? 'display:none' : 'display:block' }}">
                <label for="">Phần trăm cần giảm:</label>
                <input type="number" class="form-control" value="{{ $data->discount }}" name="discount">
            </div>
            <div class="p-2">
                <label for="">Thuộc tính</label>
                <label for="propeties">
                    @if (!empty($product_color) || !empty($product_size))
                        <input type="checkbox" checked class="propeties p-3" value="1" id="propeties">
                    @else
                        <input type="checkbox" class="propeties p-3" value="1" id="propeties">
                    @endif


                </label>
            </div>
            <div class="p-2" id="checksize"
                style="{{ !empty($product_color) || !empty($product_size) ? 'display:block' : 'display:none' }}">
                <div class="mb-3">
                    <label for="">Size: </label>
                    <div class="d-flex">
                        @foreach ($dataSize as $index => $item)
                            <label for="size{{ $index }}" id="labelSize{{ $index }}"
                                class="labelsize btn btn-outline-primary m-2">
                                {{ $item->name }}
                                    <input type="checkbox" {{in_array($item->id,$items_size) ? 'checked' : ''}} name="size_id[]" id="size{{ $index }}"
                                        value="{{ $item->id }}">
                            
                            </label>
                        @endforeach
                    </div>

                </div>
                <div class="mb-3">
                    <label for="">Color: </label>
                    <div class="d-flex">
                        @foreach ($dataColor as $index => $item)
                            <label for="color{{ $index }}" class="btn btn-outline-primary m-2">
                                {{ $item->name }}
                                <?php $a =[6,4]; ?>
                                <input type="checkbox" {{in_array($item->id,$items_color) ? 'checked' : ''}} class="checkboxSize"
                                    name="color_id[]" id="color{{ $index }}" value="{{ $item->id }}">
                            </label>
                        @endforeach


                    </div>

                </div>
            </div>
            <div class="p-2">
                <label for="">Danh Mục</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($dataCate as $item)
                        <option value="{{ $item->id }}" @selected($item->id == $data->category_id)>{{ $item->name }}</option>
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

    <script type="text/javascript">
        $('#sale').click(function() {
            $("#checkdiscount").toggle(this.checked);
        });
        $('#propeties').click(function() {
            $("#checksize").toggle(this.checked);
        });
    </script>
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
