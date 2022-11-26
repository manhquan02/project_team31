<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Package;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id){

        $package = Package::find($id);
        return view('screens.frontend.payment.index', ['package' => $package]);
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

    public function store(Request $request){

    }


}
