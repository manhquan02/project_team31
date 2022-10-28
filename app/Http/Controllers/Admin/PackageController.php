<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\SubjectRequest;
use App\Models\Package;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use http\Env\Response;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->start_date && $request->end_date && strtotime($request->start_date) < strtotime($request->end_date)) {
            if($request->keyword){
                $packages = Package::select('packages.*')
                    ->where('package_name', 'like', '%' . $request->keyword . '%')
                    ->where('created_at', '>=', $request->start_date)
                    ->where('created_at', '<=', $request->end_date)
                    ->paginate(12);
            }else{
                $packages = Package::select('packages.*')
                    ->where('created_at', '>=', $request->start_date)
                    ->where('created_at', '<=', $request->end_date)
                    ->paginate(12);
            }
        } else {
            if($request->keyword){
                $packages = Package::select('packages.*')
                    ->where('package_name', 'like', '%' . $request->keyword . '%')
                    ->paginate(12);
            }else{
                $packages = Package::select('packages.*')
                    ->where('id', '>', 0)
                    ->paginate(12);
            }
        }

        return view('screens.backend.package.index', compact('packages'));
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
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $new->avatar = $avatar->storeAs('images/package', $avatarName);
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
        Toastr::success(translate('Add new package successfully !'));
        return redirect()->route('admin.package.create');
    }

    public function delete($id){
        $package = Package::where('id', $id)->first();
        if($package != null){
            $package->delete();
            Toastr::success(translate('Delete package successfully !'));
            return redirect()->route('admin.package.index');
        }
        return redirect()->route('admin.package.index');
    }

    public function edit($id){
        $package = Package::where('id', $id)->first();
        $subjects = Subject::where('id', '!=', $package->subject_id)->get();
        if($package != null){
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
                $avatar = $request->avatar;
                $avatarName = $avatar->hashName();
                $package->avatar = $avatar->storeAs('images/package', $avatarName);
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
            Toastr::success(translate('Update package successfully !'));
            return redirect()->back();
        }
        return redirect()->route('admin.package.index');
    }

    public function set_pt(Request $request){
        $package = Package::where('id', $request->package_id)->first();
        if($package != null){
            if($package->set_pt == 0){
                $package ->set_pt =1;
            }else{
                $package ->set_pt =0;
            }
            $package->save();
            return response()->json([
                'status'=>true
            ]);
        }
        return response()->json([
            'status'=>false
        ]);
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
            Toastr::success(translate('Update package status successfully !'));
            return redirect()->route('admin.package.index');
        }
        return redirect()->route('admin.package.index');
    }


}
