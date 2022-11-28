<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'discount_id',
        'package_id',
        'time_id',
        'activate_day',
        'pt_id',
        'total_money',
        'weekday_name',
        'status_contract',
        'payment_method'
    ];

    protected $attributes = [
        'status_contract' => 0
    ];
    public function pt(){
        return $this->belongsTo(User::class,'pt_id','id');
    }


    public function package(){  
        return $this->belongsTo(Package::class,'package_id','id');
    }

    public function coupon(){  
        return $this->belongsTo(Discount::class,'discount_id','id');
    }
    
    public function time(){  
        return $this->belongsTo(Time::class,'time_id','id');
    }


    public function users(){
        return $this->belongsToMany(
            User::class,
            'result_contract',
            'order_id',
            'user_id'    
        );
    }

    public function times(){
        return $this->belongsToMany(
            User::class,
            'training_package',
            'order_id',
            'time_id'    
        );
    }

    
}
