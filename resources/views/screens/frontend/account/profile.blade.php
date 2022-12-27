@extends('layouts.frontend.account.account')
@section('content')

<form action="{{route('account.saveProfile')}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-3 order-xl-1 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a>
                  <img height="140px" width="200px" id="avatar" src="{{asset(Auth::user()->avatar)}}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div style="margin-top: 20px" class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-2">
                </div>
              </div>
            </div>
            <div class="text-center">
              <button id="btn-avatar" style="font-size: 12px;" class="btn btn-warning">Chọn file</button>
              <input type="file" name="avatar" hidden>
              <h3 style="margin-top: 12px;">
                {{Auth::user()->name}}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 order-xl-2">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 style="font-size: 20px; font-weight: 900" class="mb-0">Thông tin cá nhân</h3>
              </div>
            </div>
          </div>
          <div class="card-body">

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
            <button style="float: right" class="btn btn-primary">Lưu</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@section('js')
<script>
  $(function() {
    $('button#btn-avatar').on('click', function(e) {
      e.preventDefault();
      $("input[name = 'avatar']").click();
    })

    $("input[name = 'avatar']").on('change', function(e) {
      e.preventDefault();
      var input = e.target;
      var reader = new FileReader();
      reader.onload = function() {
        var dataURL = reader.result;
        var output = $('#avatar').attr('src', dataURL);
      }
      reader.readAsDataURL(input.files[0]);
    })
  });
</script>

@endsection