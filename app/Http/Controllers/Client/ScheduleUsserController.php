<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
class ScheduleUsserController extends Controller
{
    public function index(){
        $schedules = Attendance::where('user_id', '=', Auth::id());
        $schedules = Attendance::where('user_id', '=', Auth::id())->get();
        return view('screens.frontend.account.schedule', ['schedules' => $schedules]);
    }
}
