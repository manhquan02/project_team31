<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleMemberController extends Controller
{
    public function scheduleMember(Request $request){

        $schedules = Attendance::where('user_id', '=', Auth::id());
        if($schedules->count() != 0){
            $date_end = Attendance::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->first()->date;
            if(isset($request->status)){
                $schedules = $schedules->where('status', $request->status);
            }
            if(isset($request->start_date)){
                $schedules = $schedules->whereDate('date', '>=', $request->start_date);
            }
            else{
                $schedules = $schedules->whereDate('date', '>=', date('Y-m-d'));
            }
            if(isset($request->end_date)){
                $schedules = $schedules->whereDate('date', '<=', $request->end_date);
            }
            else{
                $schedules = $schedules->whereDate('date', '<=', $date_end);
            }
   
        }
        $schedules = $schedules->orderBy('date', 'asc')->paginate(12);
        return view('screens.frontend.account.schedule', ['schedules' => $schedules]);
    }
    public function profile(){
        return view('screens.frontend.account.profile');
    }

    public function reschedule($attendanceId){
        $times = Time::all();

        return view('screens.frontend.account.reschedule',['times' => $times, 'attendanceId' => $attendanceId]);
    }

    public function postReschedule($attendanceId, Request $request){
        $rule = [
            'date' => 'required',
            'time_id' => 'required',
        ];
        $messages = [
            'date.required' => 'Ngày không được để chống',
            'time_id.required' => 'Ca tập không được để chống',
        ];
        $request->validate($rule,$messages);
        $attendance = Attendance::find($attendanceId);
        $attendance->update([
            'date' => $request->date,
            'time_id' => $request->time_id
        ]);
        $weekday = date ( 'l' , strtotime($request->date) );
        $schedules = Schedule::where('id' ,'=', $attendance->schedule_id);
        $schedules->update([
            'date' => $request->date,
            'weekday_name' => $weekday,
            'time_id' => $request->time_id
        ]);
        return redirect()->route('account.schedule');
    }

    public function checkTimesCoach(Request $request){
        
        $attendance = Attendance::find($request->attendanceId);
        $ptId = $attendance->pt_id;
        $schedulesPt = Schedule::where('pt_id','=',$ptId)->where('date','=',$request->date)->pluck('time_id')->toArray(); 
        $times = Time::get()->pluck('id')->toArray();
        $arrayTimeId = array();
        foreach ($times as $key => $time){
            if(!in_array($time, $schedulesPt)){
                $ca = Time::find($time);
                $arrayTimeId[$time]=$ca->time_name . "( Từ " . $ca->start_time . " Đến " . $ca->end_time . " )";
            }
                
        }
        // dd($arrayTimeId);
        return response()->json([
            'result' => true,
            'arrayTimeId' => $arrayTimeId
        ]);

    }
}
