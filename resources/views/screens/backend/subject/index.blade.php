@extends('layouts.backend.master')
@section('title', 'Quản lý môn tập')
@section('content')

    <div>
        @if(session()->has('success'))
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <span class="text-success">{{ translate(session()->get('success')) }}</span>
            </div>
        @endif
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ translate('Subject Management') }}
                        <span class="d-block text-muted pt-2 font-size-sm">{{ translate('List') }}</span></h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{route('admin.subject.create')}}" class="btn btn-primary font-weight-bolder">
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
                </span>{{translate('Add new subject')}}</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input id="keyword" type="text" class="form-control"
                                               placeholder="{{translate('Search ...')}}"/>
                                        <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">{{translate('OrderBy')}}</label>
                                        <select class="form-control" id="orderby">
                                            <option value="asc">Asc</option>
                                            <option value="desc">Desc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">{{translate('Column')}}</label>
                                        <select class="form-control" id="row">
                                            <option value="id">ID</option>
                                            <option value="subject_name">{{translate('Subject name')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                            <a id="sort" class="btn btn-light-primary px-6 font-weight-bold">{{translate('Search')}}</a>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{translate('Subject name')}}</th>
                        <th>{{translate('Image')}}</th>
                        <th>{{translate('Description')}}</th>
                        <th>{{translate('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @if($subjects != null)
                        @foreach($subjects as $key=>$item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subject_name}}</td>
                                <td>
                                    <img width="100px" height="100px" src="{{asset($item->image)}}" alt="">
                                </td>
                                <td>{!! $item->description !!}</td>
                                <td>
                                    <a  href="{{route('admin.subject.edit', $item->id)}}"><i class="flaticon2-pen text-warning"></i></a>
                                    <a id="btn-del" href="{{route('admin.subject.delete', $item->id)}}" style="margin-left: 12px"><i class="flaticon2-trash text-danger"></i></a>
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
                        var cfm = confirm("{{ translate('Are you sure you want to delete ?') }}");
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
