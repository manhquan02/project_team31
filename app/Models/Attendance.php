<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance_member';
    protected $attributes = [
        'status' => 1
    ];

    protected $fillable = [
        'user_id',
        'contract_id',
        'time_id',
        'weekday_id',
        'weekday_id',
        'pt_id',
        'date',
        'status'
    ];
}
