<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
    public function create()
    {
        //
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
    public function show($id, Request $request)
    {
        if ($request->start_date && $request->end_date && strtotime($request->start_date) <= strtotime($request->end_date)) {
            if(isset($request->status)){
                $schedules = Schedule::select('schedule_pt.*')
                    ->where('pt_id', $id)
                    ->where('status', $request->status)
                    ->whereDate('created_at', '>=', $request->start_date)
                    ->whereDate('created_at', '<=', $request->end_date)
                    ->orderBy('date', 'asc')
                    ->paginate(12);
            }else{
                $schedules = Schedule::select('schedule_pt.*')
                    ->where('pt_id', $id)
                    ->whereDate('created_at', '>=', $request->start_date)
                    ->whereDate('created_at', '<=', $request->end_date)
                    ->orderBy('date', 'asc')
                    ->paginate(12);
            }
        } else {
            if(isset($request->status)){
                $schedules = Schedule::select('schedule_pt.*')
                    ->where('pt_id', $id)
                    ->where('status', $request->status)
                    ->orderBy('date', 'asc')
                    ->paginate(12);
            }else{
                $schedules = Schedule::where('pt_id', $id)->orderBy('date', 'asc')->paginate(12);
            }
        }
        if(count($schedules) > 0){
            $user = \App\Models\User::where('id', $id)->first();
            return view('screens.backend.schedule.show', compact('schedules', 'user'));
        }
        return redirect()->back();
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
