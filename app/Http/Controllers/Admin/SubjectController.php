<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $new = new Subject();
        $subjects = $new->get_all();
        return view('screens.backend.subject.index', compact('subjects'));
    }

    public function sort(Request $request)
    {
        $new = new Subject();
        $subjects = $new->sort($request->keyword, $request->row, $request->orderby);
        return response()->json([
            'result'=>true,
            'data'=>$subjects
        ]);
    }
}
