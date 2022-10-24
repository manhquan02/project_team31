@extends('layouts.backend.master')
@section('title', 'Cấu hình ngôn ngữ')
@section('content')
    @php
        $translate = new \App\Models\Translation();
    @endphp
    <div>
        @if(session()->has('success'))
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <span class="text-success">{{ $translate->translate(session()->get('success')) }}</span>
            </div>
        @endif
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ $translate->translate('Configuration') }}
                        <span class="d-block text-muted pt-2 font-size-sm">{{ $translate->translate('Language') }}</span></h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{route('admin.language.create')}}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>{{$translate->translate('Add language')}}</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{$translate->translate('Language')}}</th>
                        <th>{{$translate->translate('Flag')}}</th>
                        <th>{{$translate->translate('Language code')}}</th>
                        <th>{{$translate->translate('Default')}}</th>
                        <th>{{$translate->translate('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @if($languages != null)
                        @foreach($languages as $key=>$item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <img width="100px" height="100px" src="{{asset($item->flag)}}" alt="">
                                </td>
                                <td>{{$item->code}}</td>
                                <td><input type="checkbox" @if($item->status == 1) checked @endif></td>
                                <td>
                                    <a href="{{ route('admin.language.translate', $item->code) }}"><i class="ki ki-reload text-info"></i></a>
                                    <a  href="#" style="margin-left: 12px"><i class="flaticon2-pen text-warning"></i></a>
                                    <a id="btn-del" href="{{route('admin.language.delete', $item->id)}}" style="margin-left: 12px"><i class="flaticon2-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function (){
            function confirm_del(){
                var del = document.querySelectorAll('#btn-del');
                del.forEach(function(item){
                    item.onclick = function () {
                        var cfm = confirm("Bạn có chắc chắn muốn xóa ?");
                        if (cfm == true) {
                            return true;
                        }
                        else return false;
                    }
                });
            };
            confirm_del();
            $(document).on('click', '#sort', function(){
                const orderby = $('#orderby').val();
                const row = $('#row').val();
                const url = "{{route('admin.subject.sort')}}";
                const keyword = $('#keyword').val();
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        orderby: orderby,
                        row:row,
                        keyword:keyword
                    },
                    success:function (res){
                        let data = res.data;
                        HandleData(res.data);
                    }
                })
            });

            function HandleData(data){
                let url = window.location.origin;

                let html = data.map(function(value, key) {
                    return `
                 <tr>
                                <td>${value.id}</td>
                                <td>${value.subject_name}</td>
                                <td>
                                    <img width="100px" height="100px" src="${url + '/' + value.image}" alt="">
                                </td>
                                <td>${value.description}</td>
                                <td>
                                    <a href="${url + '/admin/subject/edit/' + value.id}"><i class="flaticon2-pen text-warning"></i></a>
                                    <a id="btn-del" href="${url + '/admin/subject/delete/' + value.id}" style="margin-left: 12px"><i class="flaticon2-trash text-danger"></i></a>
                                </td>
                            </tr>`
                })
                $('#tbody').html(html)
                confirm_del();
            }
        })
    </script>
@endsection
