<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultContract extends Model
{
    use HasFactory;
    protected $table = 'result_contract';

    protected $fillable = [
        'user_id',
        'order_id',
        'contract_id',
        'height',
        'weight',
        'bmi',
        'comment',
        'status'
    ];
}
