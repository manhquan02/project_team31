@extends('layouts.frontend.account.account')
@section('content')
<div class="card-header bg-white border-0">
  <div class="row align-items-center">
    <div class="col-8">
      <h3 style="font-size: 20px; font-weight: 900" class="mb-0">Thông tin cá nhân</h3>
    </div>
    <div class="col-4 text-right">
      {{-- <a href="#!" class="btn btn-sm btn-primary">Settings</a>  --}}
    </div>
  </div>
</div>
<div class="card-body">

  <form action="{{route('account.saveProfile')}}" method="post">

    @csrf
    @method('PATCH')
    <!--  <h6 class="heading-small text-muted mb-4">User information</h6> -->
    <div class="pl-lg-4">
      @if(session()->has('error'))
      <div class="row">
        <span class="text-danger">{{session()->get('error')}}</span>
      </div>
      @endif
      @if(session()->has('success'))
      <div class="row">
        <span class="text-success">{{session()->get('success')}}</span>
      </div>
      @endif
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Ảnh đại diện</label>
            <input type="file" id="input-username" class="form-control form-control-alternative" name="avatar" value="{{Auth::user()->name}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group focused">
            <label class="form-control-label" for="input-username">Họ và tên</label>
            <input type="text" id="input-username" class="form-control form-control-alternative" name="name" value="{{Auth::user()->name}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group focused">
            <label class="form-control-label" for="input-last-name">Địa chỉ</label>
            <input type="text" id="input-last-name" class="form-control form-control-alternative" name="address" value="{{Auth::user()->address}}">
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label" for="input-email">Email</label>
            <input type="email" id="input-email" class="form-control form-control-alternative" name="email" value="{{Auth::user()->email}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group focused">
            <label class="form-control-label" for="input-first-name">Số điện thoại</label>
            <input type="text" id="input-first-name" class="form-control form-control-alternative" name="phone" value="{{Auth::user()->phone}}">
          </div>
        </div>

      </div>
    </div>
    <hr class="my-4">
    <!-- Address -->
    <!-- <h6 class="heading-small text-muted mb-4">Contact information</h6>
    <div class="pl-lg-4">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group focused">
            <label class="form-control-label" for="input-address">Address</label>
            <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group focused">
            <label class="form-control-label" for="input-city">City</label>
            <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group focused">
            <label class="form-control-label" for="input-country">Country</label>
            <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label" for="input-country">Postal code</label>
            <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
          </div>
        </div>
      </div>
    </div>
    <hr class="my-4"> -->
    <!-- Description -->
    <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
    <div class="pl-lg-4">
      <div class="form-group focused">
        <label>About Me</label>
        <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
      </div>
    </div> -->
    <button style="float: right" class="btn btn-primary">Lưu</button>
  </form>
</div>

@endsection