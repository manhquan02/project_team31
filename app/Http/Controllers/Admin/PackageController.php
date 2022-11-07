<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\SubjectRequest;
use App\Models\Package;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Utility\PackageUtility;
use http\Env\Response;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
            if(isset($request->subject_id)){
                if(isset($request->status)){
                    $packages = Package::select('packages.*')
                        ->where('subject_id', $request->subject_id)
                        ->where('status', $request->status)
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);
                }else{
                    $packages = Package::select('packages.*')
                        ->where('subject_id', $request->subject_id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);
                }
            }else{
                if(isset($request->status)){
                    $packages = Package::select('packages.*')
                        ->where('status', $request->status)
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);
                }else{
                    $packages = Package::select('packages.*')
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);
                }
            }
        $package_type=PackageUtility::$arrayPackage;

        return view('screens.backend.package.index', compact('packages','package_type'));

    }

    public function create()
    {
        $subjects = Subject::all();
        return view('screens.backend.package.create', compact('subjects'));
    }

    public function store(PackageRequest $request)
    {
        $new = new Package();
        $new->package_name = $request->package_name;
        $new->subject_id = $request->subject_id;
        if($request->avatar){
            upload_image($request, $new, 'images/package');
        }
        $new->price = $request->price;
        if($request->price_sale){
            $new->price_sale = $request->price_sale;
        }

        $new->into_price = $request->price - ($request->price * $new->price_sale  / 100);
        $new->description = $request->description;
        $new->month_package = $request->month_package;
        if($request->set_pt == 'on'){
            $new->set_pt = 1;
        }
        $new->save();
        Toastr::success(translate('Add new package successfully'));
        return redirect()->route('admin.package.create');
    }

    public function edit($id){
        $package = Package::where('id', $id)->first();
        if($package != null){
            $subjects = Subject::where('id', '!=', $package->subject_id)->get();
            return view('screens.backend.package.edit', compact('package', 'subjects'));
        }
        return redirect()->route('admin.package.index');
    }

    public function update(PackageRequest $request, $id){

        $package = Package::where('id', $id)->first();
        if($package != null){
            $package->package_name = $request->package_name;
            $package->subject_id = $request->subject_id;
            if($request->avatar){
                upload_image($request, $package, 'images/package');
            }
            $package->price = $request->price;
            if($request->price_sale){
                $package->price_sale = $request->price_sale;
            }

            $package->into_price = $request->price - ($request->price * $package->price_sale  / 100);
            $package->description = $request->description;
            $package->month_package = $request->month_package;

            if($request->set_pt == 'on'){
                $package->set_pt = 1;
            }else{
                $package->set_pt = 0;
            }
            $package->save();
            Toastr::success(translate('Update package successfully'));
            return redirect()->back();
        }
        return redirect()->route('admin.package.index');
    }

    public function change_status($id){
        $package = Package::where('id', $id)->first();
        if($package != null){
            if($package->status == 0){
                $package ->status =1;
            }else{
                $package ->status =0;
            }
            $package->save();
            Toastr::success(translate('Update package status successfully'));
            return redirect()->route('admin.package.index');
        }
        return redirect()->route('admin.package.index');
    }
}
