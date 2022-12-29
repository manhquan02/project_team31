<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function index()
    {
    }

    public function rateStar(Request $request, $package_id)
    {
        $ex_rate = Rate::where('user_id', Auth::id())->where('package_id', $package_id)->first();
        $new_rate = new Rate();

        if ($ex_rate != null) {
            $ex_rate->note = $request->note;
            $ex_rate->star = $request->star;
            $ex_rate->save();
        } else {
            $new_rate->user_id = Auth::id();
            $new_rate->package_id = $package_id;
            $new_rate->star = $request->star;
            $new_rate->note = $request->note;
            $new_rate->save();
        }
        return redirect()->back();
    }
}
