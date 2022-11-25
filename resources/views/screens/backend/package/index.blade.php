@extends('layouts.backend.master')
@section('title', translate('Package Management'))
@section('content')

    <div>
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ translate('Package Management') }}
                        <span class="d-block text-muted pt-2 font-size-sm">{{ translate('List') }}</span></h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{route('admin.package.create')}}" class="btn btn-primary font-weight-bolder">
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
                </span>{{ translate('Add New Package') }}</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin::Search Form-->
                <form action="">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-6 my-2 my-md-0">
                                                <select name="subject_id"  class="form-control select2 is-invalid" id="kt_select2_1_validate" >
                                                    <option selected disabled>{{ translate('Choose a subject') }}</option>
                                                    @php
                                                    $subjects = \App\Models\Subject::all();
                                                    @endphp
                                                    @foreach ($subjects as $item)
                                                        <option  value="{{$item->id}}" @if(request('subject_id', -1) == $item->id) selected @endif>{{$item->subject_name}}  </option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="col-md-6 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">{{translate('Status')}}</label>
                                            <select class="form-control" name="status">
                                                <option selected disabled>{{ translate('Choose a status') }}</option>
                                                <option value="0" @if(request('status', -1) == 0) selected @endif>{{ translate('Lock') }}</option>
                                                <option value="1" @if(request('status', -1) == 1) selected @endif>{{ translate('Active') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <button
                                    class="btn btn-light-primary px-6 font-weight-bold">{{translate('Search')}}</button>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                </form>
                <!--end::Search Form-->
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{ translate('Package Name') }}</th>
                        <th>{{ translate('Subject Name') }}</th>
                        <th>{{ translate('Avatar') }}</th>
                        <th>{{ translate('Listed Price') }}</th>
                        <th>{{ translate('Episode Price') }}</th>
                        <th>{{ translate('Month Package') }}</th>
                        <th>{{ translate('Loại kèm') }}</th>
                        <th>{{ translate('Status') }}</th>
                        <th>{{ translate('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @if($packages != null)
                        @foreach($packages as $key=>$item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->package_name}}</td>
                                <td>{{$item->subject->subject_name}}</td>
                                <td>
                                    <img width="100px" height="100px" src="{{asset($item->avatar)}}" alt="">
                                </td>
                                <td>{{number_format($item->price,0,'.','.')}}</td>
                                <td>{{number_format($item->into_price,0,'.','.')}}</td>
                                <td>{{$item->month_package < 12 ? $item->month_package : $item->month_package / 12}} {{ $item->month_package < 12 ? translate('month'): translate('year') }}</td>
                                <td>{{$package_type[$item->type_package]}}</td>
                                <td><span
                                        class="label label-inline {{$item->status == 1 ? 'label-light-primary': 'label-light-danger'}} font-weight-bold">{{ translate(config('status_package.'.$item->status) )}}</span>
                                </td>
                                <td>
                                    <a title="{{ translate('View') }}"
                                       href="{{route('admin.package.edit', $item->id)}}"><i
                                            class="flaticon-eye text-info"></i></a>
                                    <a title="{{ translate('Change Status') }}" class="btn-confirm"
                                       data-title="Are you sure you want to change the status ?"
                                       data-url="{{route('admin.package.change_status', $item->id)}}"
                                       style="margin-left: 12px; cursor: pointer"><i
                                            class="flaticon-warning text-warning"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div>
                    {{$packages->appends(request()->input())->links()}}
                </div>
                <!--end: Datatable-->
                @if(count($packages) <= 0)
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
    <script>
        $(document).ready(function(){
            $('.select2').select2()
        });
    </script>
    @endsection

