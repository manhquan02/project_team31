<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleCoachController extends Controller
{
    public function profile(){
        return view('screens.frontend.accountCoach.profile');
    }
    public function scheduleCoach (Request $request){
            
        $date_end = Schedule::where('pt_id', 3)->orderBy('id', 'desc')->first()->date;
        // dd($date_end);
        $schedules = Schedule::where('pt_id', 3);
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
        $schedules = $schedules->orderBy('date', 'asc')->paginate(12);
        // $schedules = Schedule::where('pt_id', $id)->orderBy('date', 'asc')->paginate(12);
        $user = \App\Models\User::where('id', 3)->first();
        return view('screens.frontend.accountCoach.schedule', ['schedules' => $schedules]);
        
    }

    public function attendanceMember($scheduleId){
        $attendances = Attendance::where('schedule_id', '=', $scheduleId)
                        ->paginate(12);
        return view('screens.frontend.accountCoach.attendance-member', compact('attendances'));
    }
    public function postAttendance(Request $request){
        
    }
}
