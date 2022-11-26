<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('id', '>', 0)->get();
        return view('screens.frontend.package.index', compact('packages'));
    }

    public function detail($id)
    {
        $package = Package::where('id', $id)->first();
      if (!$package) {
            return back();
       }
        
        return view('screens.frontend.package.detail', compact('package'));
    }
}
