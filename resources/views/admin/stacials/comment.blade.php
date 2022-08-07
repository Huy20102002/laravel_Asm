@extends('admin.layouts.master')

@section('title','Thống kê bình luận')
@section('title_content','Thống kê bình luận')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <div>
            Thống kê bình luận theo sản phẩm
        </div>
      
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table border table-hover">
           <thead>
              <tr>
                <th>
                    Sản phẩm
                </th>
                <th>
                    Số bình luận
                </th>
                <th>
                        Khác
                </th>
              </tr>
           </thead>
           <tbody>
              @foreach($data_product as $data)
              <tr>
                <td>
                    {{$data->name}}
                </td>
                <td>
                    {{$data->comment_count}}
                </td>
                <td>
                    <button class="btn btn-primary">
                        <a class="text-white" href="{{route('admin.statis.comment_details',$data->id)}}">Chi tiết</a>
                    </button>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          <div>
            {{$data_product->links()}}
          </div>
       </div>
    </div>
</div>
@endsection