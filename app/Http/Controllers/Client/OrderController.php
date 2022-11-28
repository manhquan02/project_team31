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

    public function store($id ,Request $request)
    {   
        dd($id);
        dd(array_merge($request->weekday, $request->time));
        // dd(Auth::id());
        // dd($request->payment_method);
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
        
        $order->users()->attach(Auth::id());
        
        return back()->with('success', 'Thêm order thành công');
    }
}
