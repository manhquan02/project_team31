@extends('layouts.backend.master')
@section('title', translate('Post Management'))
@section('content')
    <div>
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ translate('Post Management') }}
                        <span class="d-block text-muted pt-2 font-size-sm">{{ translate('List') }}</span></h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{route('admin.post.create')}}" class="btn btn-primary font-weight-bolder">
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
                </span>{{ translate('Add New Post') }}</a>
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
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">{{translate('Status')}}</label>
                                            <select class="form-control" name="status">
                                                <option selected disabled>{{ translate('Choose a status') }}</option>
                                                <option value="0" @if(request('status', -1) == 0) selected @endif>{{ translate('Hidden') }}</option>
                                                <option value="1" @if(request('status', -1) == 1) selected @endif>{{ translate('Show') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">{{translate('From')}}</label>
                                            <input name="start_date" @if(request('start_date')) value="{{ request('start_date') }}" @endif type="date"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">{{translate('To')}}</label>
                                            <input name="end_date" @if(request('end_date')) value="{{ request('end_date') }}" @endif type="date" class="form-control"/>
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
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{translate('Title')}}</th>
                        <th>{{translate('Subject Name')}}</th>
                        <th>{{translate('Poster')}}</th>
                        <th>{{translate('Status')}}</th>
                        <th>{{translate('Post date')}}</th>
                        <th>{{translate('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @if($posts != null)
                        @foreach($posts as $key=>$item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->subject->subject_name}}</td>
                                <td>{{$item->user->name}}</td>
                                <td><span
                                        class="label label-inline {{$item->status == 1 ? 'label-light-primary': 'label-light-danger'}} font-weight-bold">{{translate(config('status_post.'.$item->status))}}</span>
                                </td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                <td>
                                <a title="{{ translate('View') }}"
                                       href="{{route('admin.post.edit', $item->id)}}"><i
                                            class="flaticon-eye text-info"></i></a>
                                    <a title="{{translate('Delete')}}" class="btn-confirm" data-title="{{ translate('Are you sure you want to delete ?') }}" data-url="{{route('admin.post.delete', $item->id)}}"
                                       style="margin-left: 12px; cursor: pointer"><i class="flaticon2-trash text-danger"></i></a>
                                    <a title="{{ $item->status ==0 ? translate('Show') : translate('Hidden')}}"
                                       class="btn-confirm"
                                       data-title="{{ $item->status ==1 ? translate('You are sure to hidden post ?') : translate('You are sure to show post ?') }}"
                                       data-url="{{route('admin.post.change_status', $item->id)}}"
                                       style="margin-left: 12px; cursor: pointer"><i
                                            class="flaticon-warning text-dark"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <!--end: Datatable-->
                <div>
                    {{$posts->appends(request()->input())->links()}}
                </div>
                @if(count($posts) <= 0)
                    <div class="card-body">
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <h2 style="color: #999999; text-align: center">{{ translate('No records found') }}</h2>
                            </div>
                        </div>
                        <!--end::Search Form-->
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
