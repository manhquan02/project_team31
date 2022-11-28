@extends('layouts.backend.master')
@section('title', translate('Package Management'))
@section('content')
<div>
    <div class="card card-custom">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ translate('Package management') }}
                    <span class="d-block text-muted pt-2 font-size-sm">{{ translate('Add new') }}</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{route('admin.package.index')}}" class="btn btn-primary font-weight-bolder">
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
                    </span>{{ translate('List Packages') }}</a>
                <!--end::Button-->
            </div>
        </div>
        <form action="{{route('admin.package.update', $package->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">{{ translate('Package Name') }} <span class="text-danger">*</span></label>
                    <div class="col-10">
                        <input class="form-control" name="package_name" type="text" value="{{old('package_name') ? old('package_name') : $package->package_name}}" />
                        @error('package_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">{{ translate('Subject') }} <span class="text-danger">*</span></label>
                    <div class="col-10">
                        <select name="subject_id" class="form-control select2">
                            <option selected value="{{$package->subject_id}}">{{ $package->subject->subject_name}}</option>
                            @foreach ($subjects as $item)
                            <option value="{{$item->id}}" @if(old('subject_id')==$item->id) selected @endif>{{$item->subject_name}} </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">{{ translate('Avatar') }} </label>
                    <div class="col-10">
                        <input type="file" class="form-control" name="avatar" value="{{old('avatar')}}" />
                        <img id="image" src="{{asset($package->avatar)}}" width="60px" height="60px">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">{{ translate('Price') }} <span class="text-danger">*</span></label>
                    <div class="col-10">
                        <input class="form-control" name="price" type="text" value="{{old('price') ? old('price') : $package->price}}" />
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">{{ translate('% Discount') }}</label>
                    <div class="col-10">
                        <input class="form-control" name="price_sale" type="text" value="{{old('price_sale') ? old('price_sale') : $package->price_sale}}" />
                        @error('price_sale')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">{{ translate('Type Package') }} <span class="text-danger">*</span></label>
                    <div class="col-10">
                        <select class="form-control" name="type_package">
                            <option selected value="{{$package->type_package}}">{{ typePackage()[$package->type_package] }}</option>
                            @foreach(typePackage() as $key=>$item)
                            @if($key != $package->type_package)
                            <option @if(old('$type_package')==$key) selected @endif value="{{$key}}">{{ $item }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('type_package')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label">{{ translate('Short Description') }} <span class="text-danger">*</span></label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="short_description" value="{{ old('short_description') ? old('short_description') : $package->short_description}}">
                        @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label">{{ translate('Description') }}
                        <span class="text-danger">*</span></label>
                    <div class="col-10">
                        <textarea id="summernote" class="form-control" name="description">{!! old('description') ? old('description') : $package->description !!}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label">{{ translate('Have a Coach ?') }} </label>
                    <div class="col-10 p-3">
                        <input type="checkbox" id="pt" name="set_pt" @if($package->set_pt == 1) checked @endif>
                        @error('set_pt')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- <div id="weekday_pt" class="form-group row">

                </div> -->
                <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">{{ translate('Save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.select2').select2()
    });

    /* console.log($('#pt').prop('checked'));
    if ($('#pt').prop('checked') == true) {
        content = ` <label for="example-password-input" class="col-2 col-form-label">{{ translate('Number of pt on week') }} <span class="text-danger">*</span></label>
                        <div class="col-10 p-3">
                            <input class="form-control" type="number" name="weekday_pt" value="{{old('weekday_pt') ? old('weekday_pt') : $package->weekday_pt}}">
                            @error('weekday_pt')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>`

        $('#weekday_pt').html(content);
    }

    $(document).on('click', '#pt', function() {
        console.log($(this).prop('checked'));
        let content = ``;
        if ($(this).prop('checked') == true) {
            content = ` <label for="example-password-input" class="col-2 col-form-label">{{ translate('Number of pt on week') }} <span class="text-danger">*</span></label>
                        <div class="col-10 p-3">
                            <input class="form-control" type="number" name="weekday_pt" value="{{old('weekday_pt') ? old('weekday_pt') : $package->weekday_pt}}">
                            @error('weekday_pt')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>`
        }

        $('#weekday_pt').html(content);
    }) */
</script>
@endsection