@extends('layouts.frontend.account.account')
@section('content')
<div class="card-header bg-white border-0">
  <div class="row align-items-center">
    <div class="col-8">
      <h3 style="font-size: 20px; font-weight: 900" class="mb-0">Đánh giá gói tập và huấn luyện viên</h3>
    </div>
    <div class="col-4 text-right">
      {{-- <a href="#!" class="btn btn-sm btn-primary">Settings</a>  --}}
    </div>
  </div>
</div>
<div class="card-body">
  <form action="{{route('account.saveProfile')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="input-group">
        <h3>Đánh giá gói tập</h3>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          <input type="radio" aria-label="Radio button for following text input">
          </div>
        </div>
        {{-- <input type="text" class="form-control" aria-label="Text input with radio button"> --}}
        <div style="margin-left: 10px">
            <span>Kém</span>
        </div>
    </div>

    <div style="margin-top: 10px" class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          <input type="radio" aria-label="Radio button for following text input">
          </div>
        </div>
        {{-- <input type="text" class="form-control" aria-label="Text input with radio button"> --}}
        <div style="margin-left: 10px">
            <span>Khá</span>
        </div>
    </div>

    <div style="margin-top: 10px" class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          <input type="radio" aria-label="Radio button for following text input">
          </div>
        </div>
        {{-- <input type="text" class="form-control" aria-label="Text input with radio button"> --}}
        <div style="margin-left: 10px">
            <span>Tốt</span>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Nhận xét thêm</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>

      {{-- đánh giá pt --}}
      <div class="input-group">
        <h3>Đánh giá huấn luyện viên</h3>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          <input type="radio" aria-label="Radio button for following text input">
          </div>
        </div>
        {{-- <input type="text" class="form-control" aria-label="Text input with radio button"> --}}
        <div style="margin-left: 10px">
            <span>Kém</span>
        </div>
    </div>

    <div style="margin-top: 10px" class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          <input type="radio" aria-label="Radio button for following text input">
          </div>
        </div>
        {{-- <input type="text" class="form-control" aria-label="Text input with radio button"> --}}
        <div style="margin-left: 10px">
            <span>Khá</span>
        </div>
    </div>

    <div style="margin-top: 10px" class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          <input type="radio" aria-label="Radio button for following text input">
          </div>
        </div>
        {{-- <input type="text" class="form-control" aria-label="Text input with radio button"> --}}
        <div style="margin-left: 10px">
            <span>Tốt</span>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Nhận xét thêm</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
    <button style="float: right" class="btn btn-primary">Lưu</button>
  </form>
</div>

@endsection
@section('js')

@endsection