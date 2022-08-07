@extends('admin.layouts.master')

@section('title','Chi tiết thống kê bình luận')
@section('title_content','Chi tiết thống kê bình luận')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <div>
          Sản phẩm: {{$data_product->name}}
        </div>
      
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table border table-hover">
           <thead>
              <tr>
                <th>
                    Tài khoản
                </th>
                <th>
                   Nội dung
                </th>
                <th>
                    Thời gian
                 </th>
                <th>
                        Khác
                </th>
              </tr>
           </thead>
           <tbody>
              @foreach($details_comment as $data)
              <tr>
                <td>
                    {{$data->user->name}}
                </td>
                <td>
                    {{$data->content}}
                </td>
                <td>
                    {{$data->created_at}}
                </td>
                <td>
                    <form action="{{route('admin.statis.comment_delete',$data->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                      <button class="btn btn-primary">Xóa</button>
                    </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          <div>
            {{-- {{$data_product->links()}} --}}
          </div>
       </div>
    </div>
</div>
@endsection