<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->language) {
            $default = Language::where('status', 1)->first();
            if ($default != null) {
                $default->status = 0;
                $default->save();
            }
            $language = Language::where('code', $request->language)->first();
            $language->status = 1;
            $language->save();
            Toastr::success(translate('Change language successfully'));
            return redirect()->back();
        }
        $total_user = User::count();

            return view('screens.backend.dashboard', compact('total_user'));
    }
}
