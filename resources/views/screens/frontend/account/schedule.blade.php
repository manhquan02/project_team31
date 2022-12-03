@extends('layouts.frontend.account.account')

@section('content')
<h1 class="text-center my-5 text-uppercase">Lịch trình tập luyện</h1>
        <script>
          $(".datepicker").datepicker({
            labelMonthNext: "Go to the next month",
            labelMonthPrev: "Go to the previous month",
            labelMonthSelect: "Pick a month from the dropdown",
            labelYearSelect: "Pick a year from the dropdown",
            selectMonths: true,
            selectYears: true,
          });
        </script>
        <div class="row d-flex justify-content-center">
          <input type="date" value="" class="col-5 m-3 p-2" />
          <input type="date" value="" class="col-5 m-3 p-2" />
        </div>
        <table class="table table-bordered border-primary">
          <thead class="table-white">
            <tr>
              <th scope="col" class="text-center">Id</th>
              <th scope="col" class="m-3">Tên Huấn luyện viên</th>
              <th scope="col" class="m-3">Ca Tập</th>
              <th scope="col" class="m-3">Ngày tập</th>
              <th scope="col" class="m-3">Thứ tập</th>
              <th scope="col" class="m-3">Thao tác</th>
              {{-- <th scope="col" class="m-3">Bài tập</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach($schedules as $schedule)
            <tr class="table-active">
              <th scope="row" class="text-center">{{$schedule->id}}</th>
              <td>{{$schedule->pt->name}}</td>
              <td class="text-center">{{$schedule->time->time_name}}</td>
              <td class="text-center">{{$schedule->date}}</td>
              <td class="text-center">{{$schedule->weekday_name}}</td>
              {{-- <td class="text-center">tập bụng</td> --}}
              <td class="text-center">
                <a href="" class="btn btn-primary">Huỷ lịch</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection