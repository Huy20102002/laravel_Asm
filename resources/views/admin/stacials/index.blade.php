@extends('admin.layouts.master')
@section('title', 'Thống kê')
@section('title_content', 'Thống kê')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <div>
            
        </div>
      
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width='100%' cellspacing="0">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Danh Mục</th>
                        <th>Khác</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($data as $index => $size)--}}
                        <tr>
                            <td>1</td>
                            <td>Bình luận</td>

                            <td class="">
                                <div class="d-flex">
                                    <div class="m-2">
                                       <a href="{{route('admin.statis.comment')}}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                                    </div>
                                
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Đơn hàng</td>

                            <td class="">
                                <div class="d-flex">
                                    <div class="m-2">
                                       <a href="{{route('admin.statis.order')}}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                                    </div>
                                
                                </div>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            <div>
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection