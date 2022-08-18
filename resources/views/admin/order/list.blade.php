@extends('admin.layouts.master')

@section('title','Đơn Hàng')
@section('title_content','Đơn Hàng')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <div>
            Danh Sách Đơn Hàng
        </div>
      
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table border table-hover">
           <thead>
              <tr>
                <th>
                Khách Hàng
                </th>
                <th>
                    Email
                </th>
              <th>
                Số điện thoại
              </th>
                <th>
                    Địa Chỉ
                </th>
                <th>
                    Trạng thái
                </th>
                <th>
                    Thời gian đặt hàng
                </th>
                <th>
                   Khác
                </th>
              </tr>
           </thead>
           <tbody>
              @foreach($dataOrder as $data)
              <tr>
                <td>
                    {{$data->name}}
                </td>
                <td>
                    {{$data->email}}
                </td>
                <td>
                    {{$data->phone}}
                </td>
                <td>
                    {{$data->address}}
                </td>
                <td>
                    @if ($data->status == 0)
                    <b>Chờ Xác Nhận</b>
                @elseif($data->status == 1)
                    <b>Đã Xác Nhận</b>
                @elseif($data->status == 2)
                    <b>Đang giao hàng</b>
                @elseif($data->status == 3)
                    <b>Giao hàng thành công</b>
                @elseif($data->status == 4)
                    <b>Thất bại !</b>
                @endif
                </td>
                <td>
                    {{$data->created_at}}
                </td>
                <td>
                    <a href="{{route('admin.orderdetai',$data->id)}}" class="btn btn-primary">
                       Chi tiết
                    </a>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          <div>
            {{$dataOrder->links()}}
          </div>
       </div>
    </div>
</div>
@endsection