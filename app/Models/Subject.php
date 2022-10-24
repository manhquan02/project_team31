<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;


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


}
