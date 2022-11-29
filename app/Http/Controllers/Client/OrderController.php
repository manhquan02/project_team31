<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Attendance;
use App\Models\Contract;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Package;
use App\Models\ResultContract;
use App\Models\Schedule;
use App\Models\Time;
use App\Models\User;
use App\Models\Weekday;
use App\Http\Utility\PackageUtility;
use App\Models\TrainingPackage;
use DateInterval;
use DatePeriod;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($id){
        $arrayWeekdays = PackageUtility::$arrayWeekday;
        $package = Package::find($id);
        $times = Time::all();
        $coachs = User::role('coach')->get();
        return view('screens.frontend.order.index',[
                                                    'arrayWeekdays' => $arrayWeekdays, 
                                                    'times' => $times, 
                                                    'coachs' => $coachs,
                                                    'package' =>$package
                                                ]);
    }

    public function test(){
        dd('oke');
    }

    public function store($id ,Request $request)
    {   
        // dd($request->weekday);
        // dd(array_merge($request->weekday, $request->time));
        $order = new Order();
        // dd($request->discount_code);
        $training = new TrainingPackage();
        $user = User::find(Auth::id());
        $package = Package::find($id);
        $order->date_start = $request->date_start;
        $order->date_end = $request->date_end;
        $order->package_id = $id;
        $order->payment_method = 2;
        if($package->set_pt == 1){
            $order->pt_id = $request->pt_id;
            
        }
        
        
        if($request->discount_code != ""){
            $discount = Discount::where('discount_code', '=' , $request->discount_code)->first();
            if(isset($discount)){
                $discount_packages =  explode('|', $discount->package_id);
                if($discount->status == 0){
                    return back()->with('msg', 'Xin lỗi. Phiếu giảm giá này đã hết hạn'); 
                }
                if(in_array($package->id, $discount_packages)){
                    $order->total_money = $package->price - $package->price*$discount->price_sale/100;
                    // dd($package->price);
                    $order->discount_id = $discount->id;
                    $quantity_discount = $discount->quantity - 1;
                    $discount->update([
                        'quantity' => $quantity_discount,
                    ]);
                    if($discount->quantity == 0){
                        $discount->update([
                            'status' => 0,
                        ]);
                    }
                    $order->save();
                    $order->users()->attach(Auth::id());
                    
                    // dd($order->id);
                    dd($order->id);
                    $vnp_Url = $this->vpnPayment($order->id); 
                    $this->create($order->id);
                    return redirect($vnp_Url);
                    
                    // return back()->with('success', 'Thêm Order thành công'); 
                }
                else{
                    return back()->with('msg', 'Phiếu giảm giá không đúng'); 
                }
                
            }
            else{
                return back()->with('msg', 'Phiếu giảm giá không đúng'); 
            }
        }

        $order->discount_id = 0;
        $order->total_money = $package->price;
        
        $order->save();
        if($package->set_pt == 1){
            foreach ($request->weekday as $key => $value) {
                TrainingPackage::create([
                    'order_id' => $order->id,
                    'weekday_id' => $key,
                    'time_id' => $value
                ]);
            }
            
        }
        $order->users()->attach(Auth::id());
        $vnp_Url = $this->vnpPayment($order->id); 
                        return redirect($vnp_Url);
        return back()->with('success', 'Thêm order thành công');
    }

    public function vnpPayment($orderId){
        // dd($request->id);
        $order=Order::find($orderId);
        session(['cost_id' => 5]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('order.returnUrl');
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $order->total_money * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $orderId,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return $vnp_Url;
        // return redirect($vnp_Url);
    }

    public function returnUrl(){
        // dd("ok");
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN";   //Chuỗi bí mật
        $inputData = array();
        $returnData = array();

        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        // dd($inputData);
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $vnp_Amount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán VNPAY phản hồi
        $Status = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo URL thanh toán.
        $orderId = $inputData['vnp_TxnRef'];

        try {
            //Check Orderid
            //Kiểm tra checksum của dữ liệu
            $order=Order::find($orderId);
            // dd($order);
            // dd($secureHash == $vnp_SecureHash);
            // if ($secureHash == $vnp_SecureHash) {
                if ($order != NULL) {
                        if ( $order->status == 0) {
                            if ($inputData['vnp_ResponseCode'] == '00' 
                            // && $inputData['vnp_TransactionStatus'] == '00'
                            ) {
                                $order->status=1;
                                $returnData['RspCode'] = '00';
                                $returnData['Message'] = 'Giao dịch thành công';
                            } else {

                                $returnData['RspCode'] = '24';
                                $returnData['Message'] = 'Giao dịch không thành công do: Khách hàng hủy giao dịch';
                                $order->status=0;
                            }
                            
                            $order->save();
                            // dd($order->id);
                            $order = Order::find($order->id);
                            $contract = new Contract();
                            $attendance = new Attendance();
                            $schedule = new Schedule();
                            $arrayWeekdays = PackageUtility::$arrayWeekday;
                            $trainings = $order->trainings;
                            // $weekday 

                            $begin = new DateTime($order->date_start);
                            $end = new DateTime($order->date_end);
                            $interval = DateInterval::createFromDateString('1 day');
                            $period = new DatePeriod($begin, $interval, $end);
                            
                            foreach ($period as $dt) {
                                
                                foreach($trainings as $training){
                                    // dd($training->id);
                                    if($arrayWeekdays[$training->weekday_id] == $dt->format("l")){
                                        $schedule = $schedule->create([
                                            'pt_id' => $order->pt_id,
                                            'order_id' => $order->id,
                                            'time_id' => $training->time_id,
                                            'weekday_name' => $dt->format("l"),
                                            'date' => $dt->format("Y-m-d"),
                                            'status' => 1,
                                        ]);

                                                            
                                        $attendance->create([
                                            'user_id' => 1,
                                            'order_id' => $order->id,
                                            'schedule_id' =>  $schedule->id,
                                            'time_id' => $training->time_id,
                                            'weekday_name' => $dt->format("l"),
                                            'pt_id' => 1,
                                            'date' => $dt->format("Y-m-d"),
                                            'status' => 0,
                                            
                                        ]);
                                        
                                    }

                                }
                            }

                    
                            
                            
                            
                            // tạo lịch trình pt và điểm danh hội viên
                            
                    
                            // return back()->with('success', 'Mua hang thanh cong');
                        } else {
                            $returnData['RspCode'] = '02';
                            $returnData['Message'] = 'Giao dịch thất bại';
                        }

                } else {
                    $returnData['RspCode'] = '01';
                    $returnData['Message'] = 'Đơn hàng không tồn tại';
                }
            // }
            //  else {
            //     $returnData['RspCode'] = '97';
            //     $returnData['Message'] = 'Chữ ký không hợp lệ';
            // }
        }
         catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }
        //Trả lại VNPAY theo định dạng JSON

        return view('screens.backend.order.payment',compact('returnData'));
    }

    public function create($orderId)
    {
        
        $order = Order::find($orderId);
        $contract = new Contract();
        $attendance = new Attendance();
        $schedule = new Schedule();
        $arrayWeekdays = PackageUtility::$arrayWeekday;
        $trainings = $order->trainings;
        // $weekday 

        $begin = new DateTime($order->date_start);
        $end = new DateTime($order->date_end);
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        
        foreach ($period as $dt) {
            
            foreach($trainings as $training){
                // dd($training->id);
                if($arrayWeekdays[$training->weekday_id] == $dt->format("l")){
                    $schedule = $schedule->create([
                        'pt_id' => $order->pt_id,
                        'order_id' => $order->id,
                        'time_id' => $training->time_id,
                        'weekday_name' => $dt->format("l"),
                        'date' => $dt->format("Y-m-d"),
                        'status' => 1,
                    ]);

                                           
                    $attendance->create([
                        'user_id' => 1,
                        'order_id' => $order->id,
                        'schedule_id' =>  $schedule->id,
                        'time_id' => $training->time_id,
                        'weekday_name' => $dt->format("l"),
                        'pt_id' => 1,
                        'date' => $dt->format("Y-m-d"),
                        'status' => 0,
                        
                    ]);
                    
                }

            }
        }

                    
    }

    

}
