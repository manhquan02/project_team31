@extends('layouts.backend.master')
@section('title', translate('Package Management'))
@section('content')
    <div>
        <div class="card card-custom">

            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{ translate('Package management') }}
                        <span class="d-block text-muted pt-2 font-size-sm">{{ translate('Add new') }}</span></h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{route('admin.package.index')}}" class="btn btn-primary font-weight-bolder">
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
                </span>{{ translate('List Packages') }}</a>
                    <!--end::Button-->
                </div>
            </div>
            <form action="{{route('admin.package.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">{{ translate('Package Name') }} <span class="text-danger">*</span></label>
                        <div class="col-10">
                            <input class="form-control" name="package_name" type="text"
                                   value="{{old('package_name')}}"/>
                            @error('package_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">{{ translate('Subject') }} <span class="text-danger">*</span></label>
                        <div class="col-10">
                            <select class="form-control" name="subject_id">
                                <option selected disabled>{{ translate('Choose a subject') }} </option>
                                @if(count($subjects) >0)
                                    @foreach($subjects as $item)
                                        <option value="{{$item->id}}" >{{$item->subject_name}} </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('subject_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-2 col-form-label">{{ translate('Avatar') }} <span
                                class="text-danger">*</span></label>
                        <div class="col-10">
                            <input type="file" class="form-control" name="avatar" value="{{old('avatar')}}"/>
                            <img id="image" src="" width="60px" height="60px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">{{ translate('Price') }} <span class="text-danger">*</span></label>
                        <div class="col-10">
                            <input class="form-control" name="price" type="text"
                                   value="{{old('price')}}"/>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">{{ translate('% Discount') }}</label>
                        <div class="col-10">
                            <input class="form-control" name="price_sale" type="text"
                                   value="{{old('price_sale')}}"/>
                            @error('price_sale')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label">{{ translate('Description') }} <span class="text-danger">*</span></label>
                        <div class="col-10">
                            <textarea id="summernote" class="form-control" name="description">{{ old('description')}}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">{{ translate('Month Package') }} <span class="text-danger">*</span></label>
                        <div class="col-10">
                            <select class="form-control" name="month_package">
                                <option selected disabled>{{ translate('Choose number of months') }} </option>
                                <option value="1" >1 {{ translate('month') }} </option>
                                <option value="3" >3 {{ translate('month') }} </option>
                                <option value="6" >6 {{ translate('month') }} </option>
                                <option value="9" >9 {{ translate('month') }} </option>
                                <option value="12" >1 {{ translate('year') }} </option>
                                <option value="36" >3 {{ translate('year') }} </option>
                            </select>
                            @error('month_package')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label">{{ translate('Have a Coach ?') }} </label>
                        <div class="col-10 p-3">
                            <input type="checkbox" name="set_pt">
                            @error('set_pt')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label"></label>
                        <div class="col-10">
                            <button type="submit" class="btn btn-success mr-2">{{ translate('Save') }}</button>
                            <button type="reset" class="btn btn-secondary">{{ translate('Reset') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')

@endsection

