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
        <input class="form-control" name="name" type="text" placeholder="Artisanal kale" id="example-text-input"/>
       </div>
      </div>

      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Email</label>
       <div class="col-10">
        <input class="form-control" name="email" type="email" placeholder="bootstrap@example.com" id="example-email-input"/>
       </div>
      </div>
      
      <div class="form-group row">
       <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
       <div class="col-10">
        <input class="form-control" name="phone" type="tel" placeholder="0383869999" id="example-tel-input"/>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-password-input" class="col-2 col-form-label">Password</label>
       <div class="col-10">
        <input class="form-control" name="password" type="password" placeholder="hunter2" id="example-password-input"/>
       </div>
      </div>
      <div class="form-group row">
        <label for="example-password-input" class="col-2 col-form-label">Confirm Password</label>
        <div class="col-10">
         <input class="form-control" name="confirm_password" type="password" placeholder="hunter2" id="example-password-input"/>
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
         <input class="form-control" name="address" type="text" placeholder="" id="example-text-input"/>
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