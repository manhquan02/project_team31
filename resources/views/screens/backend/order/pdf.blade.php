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
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  text-align: center;
}

tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
  </head>
  <body>
  <div style="overflow-x: auto;">
    <div style="text-align: center;color:blue"><h2>Danh sách đơn</h2></div>
  <table>
                    <thead>
                    <tr style="background-color: #7545be;">
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
                     <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->package->package_name}}</td>                       
                        <td>{{$order->time->time_name}}</td>
                        <td>{{$order->weekday_name}}</td>
                        <td>{{$order->pt->name}}</td>
                        <td>{{number_format($order->total_money,0,'.','.')}}</td> 
                        <td>{{$order->payment_method == 1 ? translate('Direct payment') : translate('Transfer payment')}}</td>
                        <td>
                           
                            <span
                                class="label label-inline label-light-primary font-weight-bold">{{$order->status_contract == 1 ? translate('Yes') : translate('No')}}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
    </div>
  </body>
</html>