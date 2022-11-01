@extends('layouts.backend.master')

@section('title', 'Thêm phiếu giảm giá')

@section('content')
<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Thêm mới người dùng
     </h3>
    </div>
    <!--begin::Form-->
    <form action="{{route('admin.discount.postDiscount')}}" method="POST">
        @csrf
        @method('POST')
     <div class="card-body">
      
      <div class="form-group row">
       <label  class="col-2 col-form-label">Tiêu đề</label>
       <div class="col-10">
        <input class="form-control @error('discount_title') is-invalid @enderror" value="{{$discounts->discount_title}}" name="discount_title"  type="text" value="{{ old('discount_title') }}" placeholder="title" id="example-text-input"/>
        @error('discount_title')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>

      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Code</label>
       <div class="col-10">
        <input class="form-control @error('discount_code') is-invalid @enderror" value="{{$discounts->discount_code}}" name="discount_code" type="text" value="{{ old('discount_code') }}" placeholder="dvbFGJvasjF" id="example-email-input"/>
        @error('discount_code')
            <span  class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>
      
      <div class="form-group row">
       <label for="example-tel-input" class="col-2 col-form-label">Sale</label>
       <div class="col-10">
        <input class="form-control @error('price_sale') is-invalid @enderror" value="{{$discounts->price_sale}}" name="price_sale" type="number" value="{{old('price_sale') }}" placeholder="%" id="example-tel-input"/>
        @error('price_sale')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label for="example-password-input" class="col-2 col-form-label">Số lượng</label>
       <div class="col-10">
        <input class="form-control @error('quantity') is-invalid @enderror" value="{{$discounts->quantity}}" name="quantity" type="number" value="{{old('quantity') }}" placeholder="12345" id="example-password-input"/>
        @error('quantity')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>
     
 
    <div class="form-group row">
        <label class="col-2 col-form-label">Chọn gói tập Sale</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <select class="form-control select2" id="kt_select2_3" name="package_id[]" placeholder="Chọn gói tập" multiple="multiple">
                <optgroup label="Gói tâp">
                    @foreach ($packages as $package)
                      <option selected="selected" value="{{$package->id}}">{{$package->package_name}}</option>  
                    @endforeach                   
                </optgroup>
            </select>
            @error('package_id')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        
    </div>
    
    <div class="form-group row">
        <label class="col-2 col-form-label">Thời gian bắt đầu</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group date" >
                    <input type="date" class="form-control" name="start_date" value="{{$discounts->start_date}}" placeholder="Select time" id="kt_datetimepicker_7"/>
                    <div class="input-group-append">
                    <span class="input-group-text">
                    <i class="la la-calendar glyphicon-th"></i>
                    </span>
                    </div>
                </div>
            <span class="form-text text-muted">Thời gian bắt đầu</span>
            @error('start_date')
             <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
    </div> 


    <div class="form-group row">
        <label class="col-2 col-form-label">Thời gian kết thúc</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group date" >
                    <input type="date" class="form-control" value="{{$discounts->end_date}}" name="end_date" placeholder="Select time" id="kt_datetimepicker_7"/>
                    <div class="input-group-append">
                    <span class="input-group-text">
                    <i class="la la-calendar glyphicon-th"></i>
                    </span>
                    </div>
                </div>
            <span class="form-text text-muted">Thời gian kết thúc</span>
            @error('end_date')
             <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
    </div> 
    
      
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
       </div>
      </div>
     </div>
    </form>
   </div>
    
@endsection

@section('script')

<script>
    $(document).ready(function(){
        $('.select2').select2()
    })
</script>

@endsection