<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Schedule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleCoachController extends Controller
{
    public function profile()
    {
        return view('screens.frontend.accountCoach.profile');
    }

    public function scheduleCoach(Request $request)
    {
        
        $schedules = Schedule::where('pt_id', Auth::id());
        if ($schedules->count() != 0) {
            $date_end = Schedule::where('pt_id', Auth::id())->orderBy('id', 'desc')->first()->date;
            if (isset($request->status)) {
                $schedules = $schedules->where('status', $request->status);
            }
            if (isset($request->start_date)) {
                $schedules = $schedules->whereDate('date', '>=', $request->start_date);
            } else {
                $schedules = $schedules->whereDate('date', '>=', date('Y-m-d'));
            }
            if (isset($request->end_date)) {
                $schedules = $schedules->whereDate('date', '<=', $request->end_date);
            } else {
                $schedules = $schedules->whereDate('date', '<=', $date_end);
            }
        }
        $schedules = $schedules->orderBy('date', 'asc')->paginate(12);
        /*  $schedules = Schedule::where('pt_id', $id)->orderBy('date', 'asc')->paginate(12); */
        return view('screens.frontend.accountCoach.schedule', ['schedules' => $schedules]);
    }

    public function attendanceMember($scheduleId)
    {
        $attendances = Attendance::where('schedule_id', '=', $scheduleId)
            ->paginate(12);
        // dd($attendances);
        $date = Schedule::find($scheduleId)->date;
        return view('screens.frontend.accountCoach.attendance-member', compact('attendances', 'scheduleId', 'date'));
    }

    public function postAttendanceMember(Request $request, $scheduleId)
    {
        $attendance_on = Attendance::where('schedule_id', $scheduleId)->get();
        foreach ($attendance_on as  $item) {
            $item->status = 1;
            $item->save();
        }
        if ($request->attendance) {
            foreach ($request->attendance as  $key => $change) {
                foreach ($attendance_on as  $item) {
                    if ($key == $item->id && $change == 'on') {
                        $item->status = 1;
                        $item->save();
                    }

                    $schedule_pt = Schedule::where('id', $scheduleId)->first();
                    if ($schedule_pt != null) {
                        $schedule_pt->status = 1;
                        $schedule_pt->save();
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'Điểm danh thành công');
    }
}
