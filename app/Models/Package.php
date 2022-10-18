<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';
    protected $fillable = [
        'packages_name',
        'subject_id',
        'price',
        'price_sale',
        'into_price',
        'description',
        'start_date',
        'end_date',
        'status'

    ];

    protected $attributes = [
        'status' => 1
    ];
}
