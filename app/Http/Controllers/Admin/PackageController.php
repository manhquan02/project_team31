<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Package;
use App\Models\Subject;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        if($request->orderby && $request->column){
            if ($request->keyword != '') {
                $packages = Package::select('packages.*')
                    ->where('package_name', 'like', '%' . $request->keyword . '%')
                    ->orderBy($request->column, $request->orderby)->paginate(12);
            } else {
                $packages = Package::select('packages.*')
                    ->orderBy($request->column, $request->orderby)->paginate(12);
            }
        }else{
            $packages = Package::where('id', '>', 0)->paginate(12);
        }

        return view('screens.backend.package.index', compact('packages'));
    }

    public function sort(Request $request)
    {
        $new_subject = new Subject();
        $subjects = $new_subject->sort($request->keyword, $request->row, $request->orderby);
        return response()->json([
            'result' => true,
            'data' => $subjects
        ]);
    }

    public function create()
    {
        return view('screens.backend.package.create');
    }

    public function store(SubjectRequest $request)
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
        $new->price_sale = $request->price_sale;
        $new->into_price = $request->price - ($request->price * $request->price_sale / 100);
        $new->description = $request->description;
        return redirect()->route('admin.subject.create')->with('success', 'Thêm mới môn tập thành công !');
    }

    public function delete($id){
        $subject = Subject::where('id', $id)->first();
        if($subject != null){
            $subject->delete();
            return redirect()->route('admin.subject.index')->with('success', 'Xóa môn tập thành công !');
        }
        return redirect()->route('admin.subject.index');
    }

    public function edit($id){
        $subject = Subject::where('id', $id)->first();
        if($subject != null){
            return view('screens.backend.subject.edit', compact('subject'));
        }
        return redirect()->route('admin.subject.index');
    }

    public function update(Request $request, $id){
        $new_subject = new Subject();
        $subject = Subject::where('id', $id)->first();
        $new_subject->update_item($subject, $request);
        return redirect()->route('admin.subject.edit', $id)->with('success', 'Cập nhật môn tập thành công !');
    }
}
