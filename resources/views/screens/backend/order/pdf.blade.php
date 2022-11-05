<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF</title>
    <style>
        body {
font-family: DejaVu Sans;
font-size: 18px;
}
th,td{
    text-align: center;
    padding: 0 4px;
}
th{
    background-color: #7270cc;
}
    </style>
  </head>
  <body>
    <div>
    <div style="text-align: center;color:Blue"><h2>Danh sách đơn</h2></div>
  <table>
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>{{translate('Username')}}</th>
                        <th>{{translate('Package')}}</th>
                        <th>{{translate('Shift')}}</th>
                        <th>{{translate('Day')}}</th>
                        <th>{{translate('PT training')}}</th>
                        <th>{{translate('Total money')}}</th>
                        <th>{{translate('Payment method')}}</th>
                        <th>{{translate('Contract signed ?')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                     <tr @if($order->status_contract==1) style="background-color:#47cc2e"  @else style="background-color:goldenrod" @endif">
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->package->package_name}}</td>                       
                        <td>
                            @if(isset($order->time->time_name))
                            {{$order->time->time_name}}
                            @endif
                        </td>
                        <td>
                            @if(isset($order->weekday_name))
                            {{$order->weekday_name}}
                            @endif
                        </td>
                        <td>{{$order->pt->name}}</td>
                        <td>{{number_format($order->total_money,0,'.','.')}}</td> 
                        <td>{{$order->payment_method}}</td>
                        <td>
                            @if ($order->status_contract == 1)
                            <span
                                class="label label-inline label-light-primary font-weight-bold">{{translate('Yes')}}</span>
                        @else
                            <span class="label label-inline label-light-danger font-weight-bold">{{translate('No')}}</span>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
    </div>
  </body>
</html>