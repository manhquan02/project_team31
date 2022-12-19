<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProfileRequest;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleMemberController extends Controller
{
    public function scheduleMember(Request $request)
    {

        $schedules = Attendance::where('user_id', '=', Auth::id());
        if ($schedules->count() != 0) {
            $date_end = Attendance::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->first()->date;
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
            $schedules = $schedules->orderBy('date', 'asc')->paginate(12);
            return view('screens.frontend.account.schedule', ['schedules' => $schedules]);
        }
        return back()->with('Bạn không có lịch tập nào');
    }
    public function profile()
    {
        return view('screens.frontend.account.profile');
    }

    public function saveProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user_ex_phone = $request->phone != null ? User::where('phone', $request->phone)->first() : null;
        $user_ex_email = $request->email != null ? User::Where('email', $request->email)->first() : null;

       
        if ($user != null) {
            if ($request->name != null) {
                $user->name = $request->name;
                $user->save();
            }
            if ($request->address != null) {
                $user->address = $request->address;
                $user->save();
            }
            if ($user_ex_phone != null && $user->phone != $request->phone) {
                return redirect()->back()->with('error', 'Số điện thoại bạn muốn đổi đã tồn tại');
            }
            if ($user_ex_phone == null && $request->phone != null && $user->phone != $request->phone) {
                $user->phone = $request->phone;
                $user->save();
            }

            if ($user_ex_email != null && $user->email != $request->email) {
                return redirect()->back()->with('error', 'Email bạn muốn đổi đã tồn tại');
            }
            if ($user_ex_email == null && $request->email != null && $user->email != $request->email) {
                $user->email = $request->email;
                $user->save();
            }

            return redirect()->back();
        }
    }
}
