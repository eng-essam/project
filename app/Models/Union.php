<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;

    protected $table = "unions";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class,'user_user');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'union_service','union_id','service_id')->withTimestamps()->withPivot('service_cost');
    }

   
   
}

