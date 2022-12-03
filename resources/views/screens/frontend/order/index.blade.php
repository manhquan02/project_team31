@extends('layouts.frontend.master')
@section('title', 'Trang chủ')
@section('style')
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/%40mdi/font%404.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bd-wizard.css')}}">
@endsection

@section('content')
<br/>
<div class="container">

    <div class="col-md-12 order-md-1">
        <h4 class="mb-3">Hóa đơn gói tập</h4>
        @include('screens.backend._alert')
        <form action="{{route('order.postOrder', $package->id)}}" method="POST" enctype="multipart/form-data" id="wizard">
          @csrf
            <h3>
              <div class="media">
                <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
                <div class="media-body">
                  <div class="bd-wizard-step-title">Personal Details</div>
                  <div class="bd-wizard-step-subtitle">Step 1</div>
                </div>
              </div>
            </h3>
            <section>
              @if($package->type_package == 1)
              <div class="content-wrapper">
                <h4 class="section-heading mt-0">Thời gian đăng ký gói tập</h4>
               
                <div class="row pt-10">
                  <div class="form-group col-md-6 ">
                    <label for="phoneNumber" class="sr-only"></label>
                   <p class="fw-bold">Bắt đầu</p> 
                   <div class="md-form md-outline input-with-post-icon datepicker" id="customDays">
                    <input style="border-color: black" name="date_start" placeholder="Select date" type="date" id="Customization" class="form-control">
                  </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="emailAddress" class="sr-only"></label>
                    <p class="fw-bold">Kết thúc</p>
                    <div class="md-form md-outline input-with-post-icon datepicker" id="customDays">
                      <input style="border-color: black" name="date_end" placeholder="Select date" type="date" id="Customization" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              @elseif($package->type_package == 2)
              <h4 class="section-heading mt-0">Chọn thời gian kích hoạt và gia hạn gói tập</h4>
              <div class="content-wrapper">
                <div style="width: 100%;" class="form-group">
                  <label style="color: black" for="exampleInputEmail1">Ngày kích hoạt</label>
                  <input  type="date" name="activate_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">chọn ngày kích hoạt, chúng tôi sẽ tạo lịch cho bạn.</small>
                </div>
                <div style="margin-top: 20px" class="input-group mb-3">
                  <label style="color: black">Chọn số tháng gia hạn</label>
                  <div style="width: 80%;" class="form-group">
                    <select name="month_package" class="custom-select" id="inputGroupSelect02">
                      <option selected>Choose...</option>
                      <option value="1">1 Tháng</option>
                      <option value="2">3 tháng</option>
                      <option value="3">6 tháng</option>
                      <option value="3">12 tháng</option>
                    </select>
                  </div>
                  
                </div>
              </div>
              @endif
            </section>
            <h3>
              <div class="media">
                <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
                <div class="media-body">
                  <div class="bd-wizard-step-title">Employ Details</div>
                  <div class="bd-wizard-step-subtitle">Step 2</div>
                </div>
              </div>
            </h3>
            <section>
              <div class="content-wrapper">
                <h4 class="section-heading">Lịch trình tập </h4>
                <div class="row">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="schedule-table">
                                <table class="table bg-white">
                                    <thead>
                                        <tr>
                                          <th>Thời Gian</th>
                                          @foreach ($times as $time)
                                          <th>{{$time->time_name}}</th>
                                          @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($arrayWeekdays as $key => $weekday)
                                        <tr>
                                            <td class="day">
                                                {{$weekday}}
                                                <div>
                                                    <input class="checkboxclass" name="weekday[{{$key}}]" value="{{$key}}" type="checkbox">
                                                </div>
                                            </td>
                                            @foreach ($times as $time)
                                              <td class="active">
                                                <label>
                                                    <input type="radio" class="option-input radio" name="weekday[{{$key}}]" value="{{$time->id}}" /> 
                                                  </label>
                                              </td>
                                            @endforeach

                                          </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </section>
            <h3>
              <div class="media">
                  <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i></div>
                  <div class="media-body">
                      <div class="bd-wizard-step-title">PT</div>
                  
                  </div>
              </div>
          </h3>
          <section>
              <div class="content-wrapper">
                  <h4 class="section-heading mb-5">Lựa chọn PT theo yêu cầu</h4>
                  

                  <select name="pt_id" id="pet-select" class="fs-90 p-2-5 w-100 text-center">
                      <option value="">--PT hướng dẫn--</option>
                      <option value="1">Nguyễn Mạnh Quân</option>
                      <option value="2">Nguyễn Quang Huy</option>
                      <option value="3">Lê Văn An</option>
                      <option value="4">Hoàng Huy Dũng</option>
                      <option value="5">Không có PT</option>

                  </select>
          </section>
          <h3>
              <div class="media">
                  <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
                  <div class="media-body">
                      <div class="bd-wizard-step-title">Thanh toán</div>
                  
                  </div>
              </div>
          </h3>
          <section>
              <div class="content-wrapper">
                  <h4 class="section-heading mb-5">Bill thanh toán</h4>
                  
                  
                  <div class="card p-2">
                      <div class="input-group">
                          <input name="discount_code" type="text" class="form-control" placeholder="Mời nhập mã giảm giá"
                              aria-label="Recipient's username" aria-describedby="basic-addon2">
                          <div class="input-group-append w-20">
                              <button class="btn btn-secondary btn-md waves-effect m-0" type="submit">Áp
                                  dụng</button>
                          </div>
                      </div>
                  </div>

                  <div style="margin-top: 20px; width: 30%;" class="list-group-item d-flex justify-content-between">
                    <span>Tổng tiền</span>
                    <strong id="total_money">{{$package->price}}</strong>
                  </div>
                  
                  <div style="margin-top: 20px; width: 30%; border: none" class="list-group-item d-flex justify-content-between">
                    <button class="btn btn-secondary btn-md waves-effect m-0" type="submit">Thanh toán</button>
                  </div>
              </div>
          </section>

          
        </form>
    </div>
    
</div>
<br>
@endsection

@section('js')

<script>

      $package_id = {{$package->id}};
      
</script>


<script src="https://cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js"></script>
<script src="{{asset('frontend/assets/js/jquery.steps.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bd-wizard.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection