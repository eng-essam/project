<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];


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

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function union(){
        return $this->belongsTo(Union::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class,'user_user','user1_id','service_id')->withTimestamps()->withPivot('message','status');
    }
    
    public function operations(){
        return $this->belongsToMany(Service::class,'user_user','user1_id','service_id')->withTimestamps()->withPivot('message','status','admin_name');
    }

    public function users(){
        return $this->belongsToMany(User::class,'user_user','user1_id','user2_id')->withTimestamps()->withPivot('message','status','service_id');
    }
    
}


