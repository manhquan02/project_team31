@extends('layouts.backend.master')

@section('title', translate('Coupon management') )

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ translate('Coupon management') }}
                    <span class="d-block text-muted pt-2 font-size-sm">{{ translate('Add new') }}</span></h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{route('admin.discount.list')}}" class="btn btn-primary font-weight-bolder">
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
                </span>{{ translate('List Coupons') }}</a>
                <!--end::Button-->
            </div>
        </div>
        <!--begin::Form-->
        <form action="{{route('admin.discount.postDiscount')}}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-2 col-form-label">Tiêu đề</label>
                    <div class="col-10">
                        <input class="form-control @error('discount_title') is-invalid @enderror" name="discount_title"
                               type="text" value="{{ old('discount_title') }}" placeholder="title"
                               id="example-text-input"/>
                        @error('discount_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Code</label>
                    <div class="col-10">
                        <input class="form-control @error('discount_code') is-invalid @enderror" name="discount_code"
                               type="text" value="{{ old('discount_code') }}" placeholder="dvbFGJvasjF"
                               id="example-email-input"/>
                        @error('discount_code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">Sale</label>
                    <div class="col-10">
                        <input class="form-control @error('price_sale') is-invalid @enderror" name="price_sale"
                               type="number" value="{{old('price_sale') }}" placeholder="%" id="example-tel-input"/>
                        @error('price_sale')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label">Số lượng</label>
                    <div class="col-10">
                        <input class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                               type="number" value="{{old('quantity') }}" placeholder="12345"
                               id="example-password-input"/>
                        @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">Chọn gói tập Sale</label>
                    <div class="col-10">
                        <select @error('package_id') is-invalid @enderror class="form-control select2"
                        id="kt_select2_3" name="package_id[]"
                        placeholder="Chọn gói tập" multiple="multiple">
                        <optgroup label="Gói tâp">
                            @foreach ($packages as $package)
                                <option value="{{$package->id}}">{{$package->package_name}}</option>
                            @endforeach
                        </optgroup>
                        </select>
                        @error('package_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">{{ translate('Start Time') }}</label>
                    <div class="col-10">
                        <div class="input-group date">
                            <input @if(old('start_date')) value="{{old('start_date')}}" @endif type="date"
                                   class="form-control" name="start_date" placeholder="Select time"
                                   id="kt_datetimepicker_7"/>
                            <div class="input-group-append">
                    <span class="input-group-text">
                    <i class="la la-calendar glyphicon-th"></i>
                    </span>
                            </div>
                        </div>
                        <span class="form-text text-muted">{{ translate('Start Time') }}</span>
                        @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label">{{ translate('End Time') }}</label>
                    <div class="col-10">
                        <div class="input-group date">
                            <input @if(old('end_date')) value="{{old('end_date')}}" @endif" type="date"
                            class="form-control" name="end_date"/>
                            <div class="input-group-append">
                    <span class="input-group-text">
                    <i class="la la-calendar glyphicon-th"></i>
                    </span>
                            </div>
                        </div>
                        <span class="form-text text-muted">{{ translate('End Time') }}</span>
                        @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">{{ translate('Save') }}</button>
                        {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                    </div>
                </div>

        </form>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('.select2').select2()
        })
    </script>

@endsection
