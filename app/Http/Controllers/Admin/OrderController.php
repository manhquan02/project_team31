<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Package;
use App\Models\Time;
use App\Models\User;
use App\Models\Weekday;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
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
            return response()->json([
                'result' => true,
                'package' => $package
            ]);
        }
        return response()->json([
            'result' => false,
            'message' => 'Gói tập không tồn tại !'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $order = new Order();
        // dd($request->discount_code);
        $discount = Discount::where('discount_code', '=' , $request->discount_code)->first();
        $user = User::find($request->user_id);
        $package = Package::find($request->package_id);
        $order->fill($request->all());
        $order->weekday_name = implode("|",$request->weekday_name);
        if(isset($discount)){
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
        }
        else{
            $order->discount_id = 0;
            $order->total_money = $package->price;
        }
        

        $order->save();

        

        


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
}
