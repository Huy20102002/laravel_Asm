@extends('admin.layouts.master')

@section('title', 'Chi Tiết Đơn Hàng')
@section('title_content', 'Chi Tiết Đơn Hàng')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <div>
                Đơn hàng của: <b>{{ $dataDetail->name }}</b> đặt lúc <b>{{ $dataDetail->created_at }}</b>
                tình trạng đơn hàng:
                @if ($dataDetail->status == 0)
                    <b>Chờ Xác Nhận</b>
                @elseif($dataDetail->status == 1)
                    <b>Đã Xác Nhận</b>
                @elseif($dataDetail->status == 2)
                    <b>Đang giao hàng</b>
                @elseif($dataDetail->status == 3)
                    <b>Giao hàng thành công</b>
                @elseif($dataDetail->status == 4)
                    <b>Thất bại !</b>
                @endif
            </div>
            <div>
                <form action="{{ route('admin.orderstatus', $dataDetail->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @if ($dataDetail->status == 0)
                        <input type="hidden" name="status1" value="1">
                        <input type="hidden" name="name" value="{{ $dataDetail->name }}">
                        <input type="hidden" name="email" value="{{ $dataDetail->email }}">
                        <input type="hidden" name="address" value="{{ $dataDetail->address }}">
                        <button class="btn btn-sm btn-primary">xác nhận đơn hàng</button>
                    @endif

                    @if ($dataDetail->status == 1)
                    <input type="hidden" name="name" value="{{ $dataDetail->name }}">
                    <input type="hidden" name="email" value="{{ $dataDetail->email }}">
                    <input type="hidden" name="address" value="{{ $dataDetail->address }}">
                        <input type="hidden" name="status2" value="2">
                        <button class="btn btn-sm btn-primary">Đang giao hàng</button>
                    @endif

                    @if ($dataDetail->status == 2)
                    <input type="hidden" name="name" value="{{ $dataDetail->name }}">
                    <input type="hidden" name="email" value="{{ $dataDetail->email }}">
                    <input type="hidden" name="address" value="{{ $dataDetail->address }}">
                        <input type="hidden" name="status3" value="3">
                        <button class="btn btn-sm btn-primary">Đã giao hàng</button>
                    @endif
                </form>
               
            </div>
            <form action="{{route('admin.cancelOrder',$dataDetail->id)}}" method="POST">
                @csrf
                @method('PUT')
                @if ($dataDetail->status == 1 ||$dataDetail->status == 0)
                <input type="hidden" name="status4" value="4">
                <button class="btn btn-sm btn-primary">Hủy đơn hàng</button>
              @endif
            </form>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border ">
                    <thead>
                        <tr>
                            <th>
                                Thông Tin Khách Hàng
                            </th>

                            <th>
                                Thông Tin Đơn Hàng
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label class="visually-hidden" for="inputName">Tên khách hàng:
                                        {{ $dataDetail->name }}</label>
                                </div>
                                <div class="mb-3">
                                    <label class="visually-hidden" for="inputName">Email: {{ $dataDetail->email }}</label>
                                </div>
                                <div class="mb-3">
                                    <label class="visually-hidden" for="inputName">Địa Chỉ:
                                        {{ $dataDetail->address }}</label>
                                </div>
                                <div class="mb-3">
                                    <label class="visually-hidden" for="inputName">Số điện thoại:
                                        {{ $dataDetail->phone }}</label>
                                </div>
                                <div class="mb-3">
                                    <label class="visually-hidden" for="inputName">Thành Phố:
                                        {{ $dataDetail->contry }}</label>
                                </div>
                                <div class="mb-3">
                                    <label class="visually-hidden" for="inputName">Quận/Huyện:
                                        {{ $dataDetail->district }}</label>
                                </div>
                                <div class="mb-3">
                                    <label class="visually-hidden" for="inputName">Thời gian đặt hàng:
                                        {{ $dataDetail->created_at }}</label>
                                </div>
                            </td>
                            <td>
                                @foreach ($dataDetail->cart as $index => $item)
                                    <div class="mb-3 d-flex align-items-center">
                                        <div class="image">
                                            <img src="{{ asset($item->product->image) }}" width="100" alt="">
                                        </div>
                                        <div>
                                            <div class="name-product">
                                                {{ $item->product->name }} X {{ $item->quantity }}
                                            </div>
                                            <div class="proties-product">
                                              <p> Kích thước: {{$item->size->name}}</p>
                                                <p>Màu sắc: {{$item->color->name}}</p>
                                            </div>
                                            <div class="price-product">
                                                {{ number_format($item->price) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mb-3">
                                    <b>Tổng tiền:</b> {{ $dataDetail->total }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- <div>
            {{$data_product->links()}}
          </div> --}}
            </div>
        </div>
    </div>
@endsection
