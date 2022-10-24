<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('screens.backend.subject.index', compact('subjects'));
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
        return view('screens.backend.subject.create');
    }

    public function store(SubjectRequest $request)
    {
        $new_subject = new Subject();
        $new_subject->subject_name = $request->subject_name;
        if($request->image){
            $image = $request->image;
            $imageName = $image->hashName();
            $new_subject->image = $image->storeAs('images/subject', $imageName);
        }
        $new_subject->description = $request->description;
        $new_subject->save();
        return redirect()->route('admin.subject.create')->with('success', 'Add new subject successfully !');
    }

    public function delete($id){
        $subject = Subject::where('id', $id)->first();
        if($subject != null){
            $subject->delete();
            return redirect()->route('admin.subject.index')->with('success', 'Delete subject successfully !');
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
}
