<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class,'user_user')->withTimestamps()->withPivot('message','status');
    }
    
    public function unions()
    {
        return $this->belongsToMany(Union::class,'union_service')->withTimestamps()->withPivot('service_cost');
    }

    
}
