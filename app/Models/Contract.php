<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';

    protected $fillable = [
        'user_id',
        'package_id',
        'order_id',
        'activate_day',
        'weekday_id',
        'start_date',
        'end_date',
    ];

    public function order(){  
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
