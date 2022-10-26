@extends('layouts.backend.master')

@section('title', 'Thêm phiếu giảm giá')

@section('content')
<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Thêm mới Order
     </h3>
    </div>
    <!--begin::Form-->
    <form action="{{route('admin.discount.postDiscount')}}" method="POST">
        @csrf
        @method('POST')
     <div class="card-body">
      
        <div class="form-group row">
            <label class="col-2 col-form-label">Chọn người dùng</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
             <select class="form-control select2" id="kt_select2_11" multiple name="param">
              <option label="Label"></option>
              <optgroup label="Chọn người dùng">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </optgroup>

             </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2 col-form-label">Chọn gói tập</label>
            <div class="col-lg-4 col-md-9 col-sm-12">
             <select placeholder="" class="form-control select2" id="kt_select2_1" name="param">
                
                <option value=""><strong>Chọn gói tập</strong></option>
                @foreach ($packages as $package)
                    <option value="{{$package->id}}">{{$package->package_name}}</option>  
                @endforeach  
                   
             </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2 col-form-label">Chọn ca tập</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
                <select class="form-control select2 is-invalid" id="kt_select2_2_validate" name="param">

                    <option style="display: none;" value=""></option>
                    @foreach ($times as $time)
                        <option value="{{$time->id}}">{{$time->time_name}}</option>  
                    @endforeach 

                
                </select>
                    {{-- <div class="invalid-feedback">Shucks, check the formatting of that and try again.</div>
                    <span class="form-text text-muted">Example help text that remains unchanged.</span> --}}
            </div>
        </div>


        <div class="form-group row">
            <label class="col-2 col-form-label">Chọn huấn viện viên</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
                <select class="form-control select2 is-invalid" id="kt_select2_3_validate" name="param">

                    <option style="display: none;" value=""></option>
                    <option >Không có</option>
                    @foreach ($coachs as $coach)
                        <option value="{{$coach->id}}">{{$coach->name}}</option>  
                    @endforeach 

                
                </select>
                    {{-- <div class="invalid-feedback">Shucks, check the formatting of that and try again.</div>
                    <span class="form-text text-muted">Example help text that remains unchanged.</span> --}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2 col-form-label">Thời gian bắt đầu</label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class="input-group date" >
                        <input type="date" class="form-control" name="start_date" placeholder="Select time" id="kt_datetimepicker_7"/>
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
            <label  class="col-2 col-form-label">Nhập phiếu giảm giá</label>
                <div class="col-10">
                <input class="form-control @error('discount_title') is-invalid @enderror" name="discount_title"  type="text" value="{{ old('discount_title') }}" placeholder="title" id="example-text-input"/>
                @error('discount_title')
                    <span class="text-danger">{{ $message }}</span>    
                @enderror
            </div>
        </div>
            

      {{-- <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Code</label>
       <div class="col-10">
        <input class="form-control @error('discount_code') is-invalid @enderror" name="discount_code" type="text" value="{{ old('discount_code') }}" placeholder="dvbFGJvasjF" id="example-email-input"/>
        @error('discount_code')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div> --}}

      <div class="form-group row">
        <label class="col-2 col-form-label">Chọn phương thức thanh toán</label>
        <div class=" col-lg-4 col-md-9 col-sm-12">
            <select class="form-control select2 is-invalid" id="kt_select2_1_validate" name="param">


                <option value="1">Thanh toán trực tiếp</option>
                <option value="2">Chuyển khoản ngân hàng</option>

            </select>
                {{-- <div class="invalid-feedback">Shucks, check the formatting of that and try again.</div>
                <span class="form-text text-muted">Example help text that remains unchanged.</span> --}}
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


    // Class definition
var KTSelect2 = function() {
 // Private functions
    var demos = function() {
    // basic
    $('#kt_select2_1_validate').select2({
    placeholder: "Select a state"
    });

    // nested
    $('#kt_select2_2_validate').select2({
    placeholder: "Chọn ca tập"
    });

    // multi select
    $('#kt_select2_3_validate').select2({
    placeholder: "Select a state",
    });
    }

    // Public functions
    return {
    init: function() {
    demos();
    }
    };
    }();

    // Initialization
    jQuery(document).ready(function() {
    KTSelect2.init();
    });
</script>

@endsection