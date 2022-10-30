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
    <form action="{{route('admin.order.postOrder')}}" method="POST">
        @csrf
        @method('POST')
     <div class="card-body">
      
        <div class="form-group row">
            <label class="col-2 col-form-label">Chọn người dùng</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
             <select name="user_id" class="form-control select2" id="kt_select2_11">
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
             {{-- <select id="add_package" placeholder="" class="form-control select2" id="kt_select2_1" > --}}
                <select name="package_id"  class="form-control select2 is-invalid add_package" id="kt_select2_1_validate" >
                <option value=""><strong>Chọn gói tập</strong></option>
                @foreach ($packages as $package)
                    <option  value="{{$package->id}}">{{$package->package_name}}</option>  
                @endforeach  
                   
             </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2 col-form-label">Chọn ca tập</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
                <select name="time_id" class="form-control select2 is-invalid" id="kt_select2_2_validate" >

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
                <select name="pt_id" class="form-control select2 is-invalid" id="kt_select2_3_validate" >

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
                        <input type="date" class="form-control" name="activate_day" placeholder="Select time" id="kt_datetimepicker_7"/>
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
            <label class="col-2 col-form-label">Chọn thứ tập PT</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
             <select name="weekday_id[]" class="form-control select2" id="kt_select2_9" name="param" multiple>
              <option label="Label"></option>
              <optgroup label="Chọn 3 ngày">
                @foreach ($weekdays as $weekday)
                    <option value="{{$weekday->id}}">{{$weekday->weekday_name}}</option>  
                @endforeach 
              </optgroup>

             </select>
            </div>
           </div>
        
        <div class="form-group row">
            <label  class="col-2 col-form-label">Nhập phiếu giảm giá</label>
            <div style="display: flex" class="col-10">
                <input name="discount_code" style="width: 60%" class="form-control @error('discount_title') is-invalid @enderror" name="discount_title"  type="text" value="{{ old('discount_code') }}" placeholder="title" id="example-text-input"/>
                @error('discount_title')
                    <span class="text-danger">{{ $message }}</span>    
                @enderror
                <button style="margin-left: 10px" type="button" class="btn btn-outline-info">Áp dụng</button>
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

      <div id="method_pm" style="visibility: hidden; transform: translateY(-20px); opacity:0"  class="form-group row">
        <label class="col-2 col-form-label">Chọn phương thức thanh toán</label>
        <div class=" col-lg-4 col-md-9 col-sm-12">
            <select name="payment_method" class="form-control select2" id="kt_select2_10" name="param">


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
        <button type="submit" id="btn_disabled" class="btn btn-success mr-2 disabled">Submit</button>
        {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
       </div>
      </div>
     </div>
    </form>
   </div>
    
@endsection

@section('script')

<script>


    
    $('.add_package').on('change',function(){
    console.log("quân");
      $package_id = $(this).val();
      $.ajax({
          type: 'GET',
          url: "{{route('admin.order.setPackage')}}",
          data:{
                id: $package_id
            },
          
          success:function(data){
            console.log("abc");
            if(data['result'] == true){
                console.log(data['package']);
                console.log(data['result']);
                // document.querySelector('#method_pm').classList.add('method_pm_block');
                // document.querySelector('#method_pm').style.display='flex';
                document.querySelector('#method_pm').style.visibility= 'visible';
                document.querySelector('#method_pm').style.transform='translate(0)';
                document.querySelector('#method_pm').style.transition='.5s';
                document.querySelector('#method_pm').style.opacity='1';
                document.querySelector('#btn_disabled').classList.remove("disabled");
            }
          }
      });
  })

</script>

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
    placeholder: "Chọn gói tập"
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