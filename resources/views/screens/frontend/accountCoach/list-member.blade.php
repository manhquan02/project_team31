@extends('layouts.frontend.account.account')
@section('content')
<div class="card-header bg-white border-0">
    <div class="row align-items-center">
      <div class="col-8">
        <h3 style="font-size: 20px; font-weight: 900" class="mb-0">Hội viên của tôi</h3>
      </div>
      <div class="col-4 text-right">
        {{-- <a href="#!" class="btn btn-sm btn-primary">Settings</a>  --}}
      </div>
    </div>
</div>
<div style="padding-bottom: 0px;" class="card-body">

</div>
<hr style="background-color: rgb(71, 67, 67); margin-bottom: 0px; margin-top: 10px">
<div class="card-body">
    
    <table class="table">
        <thead>
            <tr align="center">
                <th scope="col" class="text-center">Id</th>
                <th scope="col" class="m-3">Tên hội viên</th>
                <th scope="col" class="m-3">Tên gói tập</th>
                <th scope="col" class="m-3">Thời gian bắt đầu</th>
                <th scope="col" class="m-3">Thời gian kết thúc</th>
                <th scope="col" class="m-3">Trạng thái</th>
                <th scope="col" class="m-3">Xem chỉ số</th>
            </tr>
        </thead>
        <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="text-center">{{ $order->id }}</td>
                        <td class="text-center">
                            {{-- {{ $order->users}} --}}
                            @foreach ($order->users as $user)
                                {{$user->name}}
                            @endforeach
                        </td>
                        <td class="text-center">
                            {{$order->package->package_name}}
                        </td>
                        <td class="text-center">{{$order->date_start}}</td>
                        <td class="text-center">{{$order->date_end}}</td>
                        <td class="view_status text-center">
                            @foreach ($order->results as $result)
                                @if($result->status_package == 0)
                                    <div style="padding: 10px" class="alert alert-primary">
                                        Đang hoạt động
                                    </div>
                                @elseif($result->status_package == 1)
                                
                                    <div style="padding: 10px" class="alert alert-success">
                                         Đã hoàn thành
                                    </div>
                                @endif
                            @endforeach
                                

                        </td>
                        <td class="text-center">
                            
                            <a href="" type="button" class="btn btn-primary">Xem</a>
                            @foreach ($order->results as $result)
                                <a href="{{route('accountPt.evaluateMember',$result->id)}}" type="button" class="btn btn-primary">cập nhật</a>
                            @endforeach
                            
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table> 
    <div>
        {{-- {{$attendances->appends(request()->input())->links()}} --}}
    </div>
</div>
     
@endsection