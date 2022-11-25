@extends('layouts.backend.master')
@section('title', translate('Dashboard'))
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">

            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 gutter-b card-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">{{ translate('User')}}</h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">

                                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                            <span class="navi-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-copy"></i>
                                            </span>
                                            <span class="navi-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <div wire:click="exportUser()" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-excel-o"></i>
                                            </span>
                                            <span class="navi-text">Excel</span>
                                        </div>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-text-o"></i>
                                            </span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="{{route('admin.order.pdf')}}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-pdf-o"></i>
                                            </span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div style="height: 100px"></div>
                    <!--end::Chart-->
                    <!--begin::Stats-->
                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                <h4 style="color: #999999;">{{$total_user}}</h4>
                                <a href="#" class="text-warning font-weight-bold font-size-h6">{{translate('Total User')}}</a>
                            </div>
                            <!-- <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                            <h4 style="color: #999999;"> 2</h4>
                                <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">New
                                    Users</a>
                            </div> -->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <!-- <div class="row m-0">
                            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                            <h4 style="color: #999999;"> 2</h4>
                                <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Item
                                    Orders</a>
                            </div>
                            <div class="col bg-light-success px-6 py-8 rounded-xl">
                            <h4 style="color: #999999;"> 2</h4>
                                <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Bug
                                    Reports</a>
                            </div>
                        </div> -->
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
</div>
<!--end::Container-->
</div>
@endsection