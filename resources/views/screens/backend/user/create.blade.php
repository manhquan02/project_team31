@extends('layouts.backend.master')

@section('title', 'Trang người dùng')

@section('content')
<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Thêm mới người dùng
     </h3>
    </div>
    <!--begin::Form-->
    <form action="{{route('admin.user.postUser')}}" method="POST">
        @csrf
        @method('POST')
     <div class="card-body">
      
      <div class="form-group row">
       <label  class="col-2 col-form-label">Tên người dùng</label>
       <div class="col-10">
        <input class="form-control @error('name') is-invalid @enderror" name="name"  type="text" value="{{ old('name') }}" placeholder="Artisanal kale" id="example-text-input"/>
        @error('name')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>

      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Email</label>
       <div class="col-10">
        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}" placeholder="bootstrap@example.com" id="example-email-input"/>
        @error('email')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>
      
      <div class="form-group row">
       <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
       <div class="col-10">
        <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="tel" {{ old('phone') }} placeholder="0383869999" id="example-tel-input"/>
        @error('phone')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label for="example-password-input" class="col-2 col-form-label">Password</label>
       <div class="col-10">
        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"  placeholder="hunter2" id="example-password-input"/>
        @error('password')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
       </div>
      </div>
      <div class="form-group row">
        <label for="example-password-input" class="col-2 col-form-label">Confirm Password</label>
        <div class="col-10">
         <input class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" type="password" placeholder="hunter2" id="example-password-input"/>
         @error('confirm_password')
            <span class="text-danger">{{ $message }}</span>    
        @enderror
        </div>
       </div>
       <div class="form-group row">
        <label class="col-lg-2 col-form-label">Communication:</label>
        <div class="col-xl-8 col-lg-8 col-sm-12 col-md-12 d-flex align-items-center">
            <div class="checkbox-inline">
                <label class="checkbox">
                    <input name="gender" type="radio"/> Nam
                    <span></span>
                </label>
                <label class="checkbox">
                    <input name="gender" type="radio"/> Nu
                    <span></span>
                </label>
                <label class="checkbox">
                    <input name="gender" type="radio"/> Khac
                    <span></span>
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label  class="col-2 col-form-label">Địa chỉ</label>
        <div class="col-10">
         <input class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" type="text" placeholder="" id="example-text-input"/>
         @error('address')
            <span class="text-danger">{{ $message }}</span>    
         @enderror
        </div>
    </div>
 
    <div class="form-group row">
        <label class="col-2 col-form-label">Phân quyền</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <select name="role" class="form-control selectpicker">
                @foreach ($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
     
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>
    
@endsection