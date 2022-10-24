<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    public function get_all()
    {
        $subjects = Subject::all();
        return $subjects;
    }

    public function sort($keyword, $row, $orderby)
    {
        if ($keyword != '') {
            $subjects = Subject::select('subjects.*')
                ->where('subject_name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%')
                ->orWhere('id', $keyword)
                ->orderBy($row, $orderby)->get();
        } else {
            $subjects = Subject::select('subjects.*')
                ->orderBy($row, $orderby)->get();
        }
        return $subjects;
    }

    public function store($new, $request)
    {
        $new->subject_name = $request->subject_name;
        if($request->image){
            $image = $request->image;
            $imageName = $image->hashName();
            $new->image = $image->storeAs('images/subject', $imageName);
        }
        $new->description = $request->description;
        $new->save();
    }

    public function update_item($subject, $request)
    {
        $subject->subject_name = $request->subject_name;
        $subject->description = $request->description;
        if ($request->image) {
            $image = $request->image;
            $imageName = $image->hashName();
            $subject->image = $image->storeAs('images/subject', $imageName);
        }
        $subject->save();
    }
}
