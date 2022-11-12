<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule_pt';

    protected $fillable = [
        'contract_id',
        'time_id',
        'weekday_name',
        'pt_id',
        'date',
        'status'
    ];

    public function time(){  
        return $this->belongsTo(Time::class,'time_id','id');
    }
}
