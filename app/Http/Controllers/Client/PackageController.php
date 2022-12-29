<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Rate;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('id', '>', 0)->get();
        $popular =  Package::where('id', '>', 0)->limit(3)->get();

        return view('screens.frontend.package.index', compact('packages', 'popular'));
    }

    public function detail($id)
    {
        $package = Package::where('id', $id)->first();
        if (!$package) {
            return back();
        }
        $rates = Rate::where('package_id', $id)->orderBy('created_at','desc')->limit(3)->get();
        $all_rate = Rate::where('package_id', $id)->get();
        $total_star = 0;
        foreach ($all_rate as $item) {
            $total_star += $item->star;
        }
        if($all_rate->count() != 0){
            $star_rate = $total_star / $all_rate->count();
        }else $star_rate = 5;
        
        return view('screens.frontend.package.detail', compact('package', 'rates', 'total_star', 'star_rate'));
    }
}
