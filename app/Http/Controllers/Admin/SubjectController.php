<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
            if ($request->start_date && $request->end_date && strtotime($request->start_date) <= strtotime($request->end_date)) {
                if($request->keyword){
                    $subjects = Subject::select('subjects.*')
                        ->where('subject_name', 'like', '%' . $request->keyword . '%')
                        ->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date)
                        ->paginate(12);
                }else{
                    $subjects = Subject::select('subjects.*')
                        ->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date)
                        ->paginate(12);
                }
            } else {
                if($request->keyword){
                    $subjects = Subject::select('subjects.*')
                        ->where('subject_name', 'like', '%' . $request->keyword . '%')
                        ->paginate(12);
                }else{
                    $subjects = Subject::select('subjects.*')
                        ->where('id', '>', 0)
                        ->paginate(12);
                }
            }
        return view('screens.backend.subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('screens.backend.subject.create');
    }

    public function store(SubjectRequest $request)
    {
        $new = new Subject();
        $new->subject_name = $request->subject_name;
        if ($request->image) {
            upload_image($request, $new, 'images/subject');
        }
        $new->description = $request->description;
        $new->save();
        Toastr::success(translate('Add new subject successfully'));
        return redirect()->route('admin.subject.create');
    }

    public function delete($id)
    {
        $subject = Subject::where('id', $id)->first();
        if ($subject != null) {
            $subject->delete();
            Toastr::success(translate('Delete subject successfully'));
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $subject = Subject::where('id', $id)->first();
        if ($subject != null) {
            return view('screens.backend.subject.edit', compact('subject'));
        }
        return redirect()->back();
    }

    public function update(SubjectRequest $request, $id)
    {
        $subject = Subject::where('id', $id)->first();
        $subject->subject_name = $request->subject_name;
        $subject->description = $request->description;
        if ($request->image) {
            upload_image($request, $subject, 'images/subject');
        }
        $subject->save();
        Toastr::success(translate('Update subject successfully'));
        return redirect()->route('admin.subject.edit', $id);
    }

}
