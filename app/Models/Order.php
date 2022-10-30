<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'discount_id',
        'package_id',
        'time_id',
        'activate_day',
        'pt_id',
        'total_money',
        'payment_method'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function package(){  
        return $this->belongsTo(Package::class,'package_id','id');
    }


    public function time(){  
        return $this->belongsTo(Time::class,'time_id','id');
    }

}
