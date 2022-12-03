<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleMemberController extends Controller
{
    public function scheduleMember(){
        $schedules = Attendance::where('user_id', '=', 1);
        $schedules = Attendance::where('user_id', '=', 1)->get();
        return view('screens.frontend.account.schedule', ['schedules' => $schedules]);
    }
}
