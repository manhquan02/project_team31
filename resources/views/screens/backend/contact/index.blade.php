@extends('layouts.backend.master')
@section('title', translate('Contact Management'))
@section('content')
    <div>
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ translate('Contact Management') }}
                        <span class="d-block text-muted pt-2 font-size-sm">{{ translate('List') }}</span></h3>
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
                                                <option value="0">{{ translate('No response yet') }}</option>
                                                <option value="1">{{ translate('Responded') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">{{translate('From')}}</label>
                                            <input name="start_date" type="date" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">{{translate('To')}}</label>
                                            <input name="end_date" type="date" class="form-control"/>
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
                        <th>{{translate('Name')}}</th>
                        <th>{{translate('Email')}}</th>
                        <th>{{translate('Phone Number')}}</th>
                        <th>{{translate('Contact Content')}}</th>
                        <th>{{translate('Status')}}</th>
                        <th>{{translate('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    @if($contacts != null)
                        @foreach($contacts as $key=>$item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->description}}</td>
                                <td><span
                                        class="label label-inline {{$item->status == 1 ? 'label-light-primary': 'label-light-danger'}} font-weight-bold">{{translate(config('status_contact.'.$item->status))}}</span></td>
                                <td>
                                    @if($item->status ==0)
                                    <a title="{{ translate('Responded ?') }}" class="btn-confirm" data-title="You are sure to have responded ?" data-url="{{route('admin.contact.change_status', $item->id)}}" style="margin-left: 12px; cursor: pointer"><i class="flaticon-warning text-dark"></i></a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <!--end: Datatable-->
                <div>
                    {{$contacts->appends(request()->input())->links()}}
                </div>
                @if(count($contacts) <= 0)
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
