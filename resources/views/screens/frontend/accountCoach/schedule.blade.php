@extends('layouts.frontend.account.account')
@section('content')
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
              <h3 style="font-size: 20px; font-weight: 900" class="mb-0">Lịch trình</h3>
            </div>
          </div>
        </div>
        <div style="padding-bottom: 0px;" class="card-body">
          <form>
            <div class="row">
              <div class="col mx-sm-3">
                <label for="">Ngày bắt đầu</label>
                <input type="date" class="form-control" placeholder="First name">
              </div>
              <div class="col mx-sm-3">
                <label for="">Ngày kết thúc</label>
                <input type="date" class="form-control" placeholder="Last name">
              </div>
              <div class="col mx-sm-3">
                <label for="">Loading</label>
                <div class="col">
                  <button type="submit" style="background-color: #FF8800" class="btn btn-primary mb-2">Tìm kiếm</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <hr style="background-color: rgb(71, 67, 67); margin-bottom: 0px; margin-top: 10px">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr align="center">
                <th scope="col" class="text-center">Id</th>
                <th scope="col" class="m-3">Ngày</th>
                <th scope="col" class="m-3">Thứ</th>
                <th scope="col" class="m-3">Ca</th>
                <th scope="col" class="m-3">Giờ bắt đầu</th>
                <th scope="col" class="m-3">Giờ kết thúc</th>
                <th scope="col" class="m-3">Trạng thái</th>
                <th scope="col" class="m-3">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              @foreach($schedules as $schedule)
              @php
              $shift = \App\Models\Time::where('id', $schedule->time_id)->first();
              @endphp
              <tr class="">
                <th scope="row" class="text-center">{{$schedule->id}}</th>
                <td class="text-center">
                  {{ date('d-m-Y', strtotime($schedule->date)) }}
                </td>
                <td class="text-center">{{ (getdate(strtotime($schedule->date))['weekday']) }}</td>
                <td class="text-center">{{$schedule->time->time_name}}</td>
                <td class="text-center">{{$schedule->time->start_time}}</td>
                <td class="text-center">{{$schedule->time->end_time}}</td>
                <td class="text-center">
                  @if($schedule->status == 0)
                  <span class="label label-inline label-light-primary font-weight-bold"> {{ (config('status_schedule.'.$schedule->status)) }}</span>

                  @else
                  <span class="label label-inline {{$schedule->status == 1 ? 'label-light-danger': 'label-light-success'}} font-weight-bold">{{(config('status_schedule.'.$schedule->status))}}</span>
                  @endif
                </td>
                {{-- <td class="text-center">tập bụng</td> --}}
                <td class="text-center">
                  <a href="{{route('accountPt.attendanceMember', $schedule->id)}}" class="btn btn-primary">Xem hội viên</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div>
            {{$schedules->appends(request()->input())->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection