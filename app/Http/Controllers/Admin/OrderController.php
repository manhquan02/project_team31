<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Contract;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Package;
use App\Models\Time;
use App\Models\User;
use App\Models\Weekday;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use PDF;

class OrderController extends Controller
{
    public function add(){
        $users = User::role('member')->get();
        $packages = Package::all();
        $times = Time::all();
        $coachs = User::role('coach')->get();
        $weekdays = Weekday::all();
        return view('screens.backend.order.test', ['users' => $users, 'packages' => $packages, 'times' => $times, 'coachs' => $coachs, 'weekdays' => $weekdays]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::get();
        // $orders = Order::select('order.*');
        // // if(isset($request->key)){
        // //     $orders = $orders->where('package_name', 'like', '%' . $request->keyword . '%')
        // //                     ->paginate(12);
        // // }
        return view('screens.backend.order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::role('member')->get();
        $packages = Package::all();
        $times = Time::all();
        $coachs = User::role('coach')->get();
        $weekdays = Weekday::all();
        return view('screens.backend.order.create', ['users' => $users, 'packages' => $packages, 'times' => $times, 'coachs' => $coachs, 'weekdays' => $weekdays]);
    }


    public function setPackage(Request $request){
        // dd($request);
        $package = Package::find($request->id);
        if(isset($package)){
            if($package->set_pt == 1){
                return response()->json([
                    'result' => 1,
                    'package' => $package,
                    
                ]);
            }
            else{
                return response()->json([
                    'result' => 0,
                    'package' => $package,
                ]);
            }
            
        }
        return response()->json([
            'result' => false,
            'message' => 'Gói tập không tồn tại !'
        ]);
    }


    public function setCoach(Request $request){
        $package = Package::find($request->id);
        
        if($package->set_pt == 1){
            return response()->json([
                'result' => true,
                'package' => $package,
                
            ]);
        }
        return response()->json([
            'result' => false,
            'message' => 'Gói tập không có huấn luyện viên !'
        ]);
    }

    public function setTotalMoney(Request $request){
        $package = Package::find($request->package_id);
        $discount = Discount::where('discount_code', '=' , $request->discount_code)->first();
        if(isset($discount)){
            $discount_packages =  explode('|', $discount->package_id);
            
            if($discount->status == 0){
                return response()->json([
                    'result' => false,
                    'message' => 'Phiếu giảm giá này đã hết hạn'
                ]);
            }
            if(in_array($package->id, $discount_packages)){
                
                return response()->json([
                    'result' => true,
                    'message' => 'Phiếu giảm tồn tại',
                    'total_money' => $package->price - $package->price*$discount->price_sale/100,
                ]);

            }
        }
        else{
            return response()->json([
                'result' => false,
                'message' => 'Phiếu giảm giá không tồn tại',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {   
        // dd($request->payment_method);
        $order = new Order();
        // dd($request->discount_code);
        $user = User::find($request->user_id);
        $package = Package::find($request->package_id);
        if($package->set_pt == 1){
            $rule = [
                'time_id' => 'required',
                'pt_id' =>'required',
                'weekday_name' =>'required',
            ];
            $messages = [
                'required' => ':attribute không được để chống',
            ];
            $request->validate($rule,$messages);
            $order->fill($request->all());
            $order->weekday_name = implode("|",$request->weekday_name);
        }
        elseif($package->set_pt == 0){
            $order->package_id = $request->package_id;
            $order->activate_day = $request->activate_day;
            $order->payment_method = $request->payment_method;
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
                    $order->users()->attach($request->user_id);
                    // dd($request->payment_method == 2);
                    if($request->payment_method == 2){
                        // dd(123);
                        $vnp_Url = $this->momoPayment($order->id); 
                        return redirect($vnp_Url);
                    }
                    
                    return back()->with('success', 'Thêm Order thành công'); 
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
        $order->users()->attach($request->user_id);
        if($request->payment_method == 2){
            // dd(123);
            $vnp_Url = $this->momoPayment($order->id); 
            return redirect($vnp_Url);
        }
        return back()->with('success', 'Thêm order thành công');
    }


    public function momoPayment($orderId){
        // dd($request->id);
        $order=Order::find($orderId);
        session(['cost_id' => 5]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/admin/order/checkPayment";
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

    function returnUrl(){

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
                        if ( $order->status_contract == 0) {
                            if ($inputData['vnp_ResponseCode'] == '00' 
                            // && $inputData['vnp_TransactionStatus'] == '00'
                            ) {
                                $order->status_contract=1;
                                $returnData['RspCode'] = '00';
                                $returnData['Message'] = 'Giao dịch thành công';
                            } else {
                                $returnData['RspCode'] = '24';
                                $returnData['Message'] = 'Giao dịch không thành công do: Khách hàng hủy giao dịch';
                                $order->status_contract=0;
                            }
                            // dd($order);
                            $order->save();

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

//dd($inputData);
    // dd($order);
        return view('screens.backend.order.payment',compact('returnData'));
    }


    public function createMulti(){
        $users = User::role('member')->get();
        $packages = Package::all();
        $times = Time::all();
        $coachs = User::role('coach')->get();
        $weekdays = Weekday::all();
        return view('screens.backend.order.create-multi', ['users' => $users, 'packages' => $packages, 'times' => $times, 'coachs' => $coachs, 'weekdays' => $weekdays]);
    }

    public function postOrderMulti(Request $request){
        // dd($request->user_id);
        $order = new Order();
        $package = Package::find($request->package_id);
        $order->fill($request->all());
        if($request->discount_code != ""){
                $discount = Discount::where('discount_code', '=' , $request->discount_code)->first();
                if(isset($discount)){
                    $discount_packages =  explode('|', $discount->package_id);
                
                    if($discount->status == 0){
                        return back()->with('msg', 'Xin lỗi. Phiếu giảm giá này đã hết hạn'); 
                    }
                    if(count($request->user_id)){
                        if(in_array($package->id, $discount_packages)){
                            foreach ($request->user_id as $key => $user) {
                                // $order->user_id = $user;
                                // $order->total_money = $package->price - $package->price*$discount->price_sale/100;
                                // $order->discount_id = $discount->id;
                                $order->create([
                                    'user_id' => $user,
                                    'discount_id' => $discount->id,
                                    'package_id' => $request->package_id,
                                    'weekday_name' => implode("|",$request->weekday_name),
                                    'time_id' => $request->time_id, 
                                    'activate_day' => $request->activate_day,
                                    'pt_id' => $request->pt_id,
                                    'total_money' => $package->price - $package->price*$discount->price_sale/100,
                                    'payment_method' => $request->payment_method,
                                ]);
                                // $order->save();
                            }
                                $quantity_discount = $discount->quantity - 1;
                                $discount->update([
                                    'quantity' => $quantity_discount,
                                ]);
                             
                                if($discount->quantity == 0){
                                    $discount->update([
                                        'status' => 0,
                                    ]);
                                }
                            return back()->with('success', 'Thêm Order thành công'); 
                        }
                    }
                    
                    else{
                        return back()->with('msg', 'Phiếu giảm giá không đúng'); 
                    }
                    
                }
                else{
                    return back()->with('msg', 'Phiếu giảm giá không đúng'); 
                }
            }
            foreach ($request->user_id as $key => $user) {
  
                $order->create([
                    'user_id' => $user,
                    'package_id' => $request->package_id,
                    'weekday_name' => implode("|",$request->weekday_name),
                    'time_id' => $request->time_id, 
                    'activate_day' => $request->activate_day,
                    'pt_id' => $request->pt_id,
                    'total_money' => $package->price,
                    'payment_method' => $request->payment_method,
                ]);
            }
            return back()->with('success', 'Thêm Order thành công');
        
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf(){
        $orders = Order::all();
        $pdf = PDF::loadView('screens.backend.order.pdf', compact('orders'))->setOption('dpi', 150);
      return $pdf->stream();
    //   return view('screens.backend.order.pdf', compact('orders'));
    }
}
