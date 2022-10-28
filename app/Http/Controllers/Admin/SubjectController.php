<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
            if ($request->start_date && $request->end_date && strtotime($request->start_date) < strtotime($request->end_date)) {
                if($request->keyword){
                    $subjects = Subject::select('subjects.*')
                        ->where('subject_name', 'like', '%' . $request->keyword . '%')
                        ->where('created_at', '>=', $request->start_date)
                        ->where('created_at', '<=', $request->end_date)
                        ->paginate(12);
                }else{
                    $subjects = Subject::select('subjects.*')
                        ->where('created_at', '>=', $request->start_date)
                        ->where('created_at', '<=', $request->end_date)
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
        $new_subject = new Subject();
        $new_subject->subject_name = $request->subject_name;
        if ($request->image) {
            $image = $request->image;
            $imageName = $image->hashName();
            $new_subject->image = $image->storeAs('images/subject', $imageName);
        }
        $new_subject->description = $request->description;
        $new_subject->save();
        return redirect()->route('admin.subject.create')->with('success', 'Add new subject successfully !');
    }

    public function delete($id)
    {
        $subject = Subject::where('id', $id)->first();
        if ($subject != null) {
            $subject->delete();
            return redirect()->back()->with('success', 'Delete subject successfully !');
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
            $image = $request->image;
            $imageName = $image->hashName();
            $subject->image = $image->storeAs('images/subject', $imageName);
        }
        $subject->save();
        return redirect()->route('admin.subject.edit', $id)->with('success', 'Update subject successfully !');
    }

    public function description($id)
    {
        $subject = Subject::where('id', $id)->first();
        $description = $subject->description;
        if ($subject != null) {
            return view('screens.backend.subject.description', compact('description'));
        }
        return redirect()->back();
    }
}
