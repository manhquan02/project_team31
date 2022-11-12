<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail   
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'avatar',
        'status',

    ];


    protected $attributes = [
        'status' => 1
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function body(){
        return $this->hasOne(Bodybmi::class, 'user_id','id');
    }

    public function orders(){
        return $this->belongsToMany(
            Order::class,
            'user_order_contract',
            'user_id',
            'order_id'
        );
    }

    public function scopeFindByName($query, $request){
        if($request->q){
            $query->where('name', 'like', '%'.$request->q.'%');
        }
    }

    public function scopeFindByOrder($query, $request){
        if($request->sort == 'idDesc')
         $query->orderByDesc('id');

        if($request->sort == 'idAsc')
            $query->orderBy('id');
        
    }

    public function scopeFindByStatus($query, $request){
        if($request->status == 0){
            $query->where('status', $request->status);
        }
        else{
            $query->where('status', $request->status);
        }
    }
}
