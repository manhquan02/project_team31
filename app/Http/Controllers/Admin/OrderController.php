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
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function add(){
        return view('screens.backend.order.test');
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
        return back()->with('success', 'Thêm order thành công');

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
