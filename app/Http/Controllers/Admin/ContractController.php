<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Contract;
use App\Models\Order;
use App\Models\Weekday;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $contract = new Contract();
        $attendance = new Attendance();
        

        $month = $order->package->month_package;
        $newdate = strtotime ( '+'.$month.' month' , strtotime ( $order->activate_day ) );
        $end_date = date ( 'Y-m-j' , $newdate );

        $contract->user_id = $order->user->id;
        $contract->package_id = $order->package->id;
        $contract->activate_date = $order->activate_day;
        $contract->order_id = $order->id;
        $contract->weekday_id = $order->weekday_id;
        $contract->start_date = $order->activate_day;
        $contract->end_date = $end_date;

        $contract->save();

        // $weekdays_pt = $order->weekday_id;
        // $weekdays_pt =  explode('|', $weekdays_pt);

        $begin = new DateTime($contract->start_date);
        $end = new DateTime($contract->end_date);

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $weekdays = Weekday::all();
        $weekday_contract = $contract->weekday_id;
        $weekdays_pt =  explode('|', $weekday_contract);
        
        foreach ($period as $dt) {
            // echo $dt->format("l Y-m-d \n");
            // echo "<br>";
            // dd($dt->format("l"));
            
            $attendance->date = $dt->format("Y-m-d");
            foreach ($weekdays_pt as $key => $item) {
                // dd($weekday);
                $weekday = Weekday::find($item);
                // dd($weekday->weekday_name);
                if($weekday->weekday_name ==  $dt->format("l")){
                    // echo $dt->format("l Y-m-d \n");
                    // echo "<br>";
                    $attendance->weekday_id = $item;
                    $attendance->pt_id = 1;
                    $attendance->user_id = $contract->user_id;
                    $attendance->contract_id = $contract->id;
                    $attendance->time_id = $contract->order->time_id;
                    $attendance->create([
                        'user_id' => $contract->user_id,
                        'contract_id' => $contract->id,
                        'time_id' => $contract->order->time_id,
                        'weekday_id' => $item,
                        'pt_id' => 1,
                        'date' => $dt->format("Y-m-d"),
                        'status' => 1,

                    ]);
                }
                // $attendance->weekday_id = 0;


            }

        }

        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
