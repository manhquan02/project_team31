<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceMemberController extends Controller
{
    public function index(){
        $attendance = Attendance::all();
        return view('screens.backend.attendance_member.index', compact('attendance'));
    }
}
