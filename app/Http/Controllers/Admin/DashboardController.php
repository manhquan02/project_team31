<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        if ($request->language) {
            $default = Language::where('status', 1)->first();
            if($default != null){
                $default->status = 0;
                $default->save();
            }
            $language = Language::where('code', $request->language)->first();
            $language->status = 1;
            $language->save();
            return redirect()->back();
        }
        return view('layouts.backend.master');
    }
}
