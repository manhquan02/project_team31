@extends('layouts.backend.master')
@section('title', 'Quản lý đánh giá')
@section('style')

<style>
    .star-style {
        background-repeat: no-repeat;
        width: 115%;
        height: 100%;
        margin-left: -7px;
    }

    .rating {
        position: absolute;
        top: -1px;
        left: 0;
    }

    .fa-star {
        margin: 5px;
        width: 20px;
        height: 10px;
    }

    .star-vote {
        width: 100px;
        height: 20px;
        position: relative;
        margin-right: 10px;
        margin-left: 10px;
    }

    .single_capt_left {
        font-size: 20px;
    }

    .alert {
        padding: 20px;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>

@endsection
@section('content')

<div>
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Quản lý đánh giá
                    <span class="d-block text-muted pt-2 font-size-sm">Danh sách</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{route('admin.user.listPt')}}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Danh sách huấn luyện viên</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Tên người dùng</th>
                        <th>Số sao</th>
                        <th>Nội dung</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @if($evaluates != null)
                    @foreach($evaluates as $key=>$item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>
                            <div class="star-vote">
                                <div class="star-style rating" style="background-image: url({{asset('images/5star1.png')}}); width:{{($item->star_package/5*100)*1.16}}%"></div>
                                <div class="star-style star_background" style="background-image: url({{asset('images/5star2.png')}});"></div>
                            </div>
                        </td>
                        <td>{{$item->note_pt}}</td>
                        <td>
                            <a title="Xóa" class="btn-confirm" data-title="Bạn có chắc chắn muốn xóa đánh giá này ?" data-url="{{route('admin.evaluate.delete', $item->id)}}" style="margin-left: 12px; cursor: pointer"><i class="flaticon-warning text-warning"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div>
                {{$evaluates->appends(request()->input())->links()}}
            </div>
            <!--end: Datatable-->
            @if(count($evaluates) <= 0) <div class="card-body">
                <div class="mb-7">
                    <div class="row align-items-center">
                        <h2 style="color: #999999; text-align: center">Không tìm thấy bản ghi</h2>
                    </div>
                </div>
        </div>
        @endif
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.select2').select2()
    });
</script>
@endsection