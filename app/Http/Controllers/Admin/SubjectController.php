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
        $new_subject = new Subject();
        $subjects = $new_subject->get_all();
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
        $new_subject->store($new_subject, $request);
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
