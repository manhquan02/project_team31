@extends('layouts.backend.master')
@section('title', translate('Language Management'))
@section('content')
    <div>
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ translate('Configuration') }}
                        <span
                            class="d-block text-muted pt-2 font-size-sm">{{ translate('Language') }}</span>
                    </h3>
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
                </span>{{translate('Add new language')}}</a>
                    <!--end::Button-->
                </div>
            </div>

            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{translate('Language')}}</th>
                        <th>{{translate('Flag')}}</th>
                        <th>{{translate('Language code')}}</th>
                        <th>{{translate('Default')}}</th>
                        <th>{{translate('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @if(count($languages) > 0)
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
                                    <a title="{{ translate('Translate') }}" href="{{ route('admin.language.translate', $item->code) }}"><i
                                            class="ki ki-reload text-info"></i></a>
                                    <a title="{{ translate('Edit') }}" href="{{route('admin.language.edit', $item->id)}}" style="margin-left: 12px"><i class="flaticon2-pen text-warning"></i></a>
                                        <a title="{{ translate('Delete') }}" class="btn-del" data-url="{{route('admin.language.delete',$item->id)}}"
                                           style="margin-left: 12px; cursor: pointer"><i class="flaticon2-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <!--end: Datatable-->
                @if(count($languages) <= 0)
                    <div class="card-body">
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <h2 style="color: #999999; text-align: center">{{ translate('No records found') }}</h2>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
