<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleMemberController extends Controller
{
    public function scheduleMember(Request $request){
        $date_end = Attendance::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->first()->date;
       
        $schedules = Attendance::where('user_id', '=', Auth::id());
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
        return view('screens.frontend.account.schedule', ['schedules' => $schedules]);
    }
    public function profile(){
        return view('screens.frontend.account.profile');
    }
}
