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

    public function information()
    {
        return $this->hasMany(Information::class);
    }

    public function test(){
        $test = $this->services;
        $data = [];
        for ($i=0; $i<$test->count();$i++){
            $data[] = [
               'service_id'=> $test[$i]-> pivot->service_id,
               'service_cost'=> $test[$i]-> pivot->service_cost,
            ];
        }
        return  $data;
      }

      public function Info(){
        $Info = $this->information;
        $data = [];
        for ($i=0; $i< $Info->count();$i++){
            $data[] = [
               'id'=>  $Info[$i]->id,
               'union_id'=>  $Info[$i]->union_id,
               'header'=>  $Info[$i]->header,
               'titel'=>  $Info[$i]->titel,
               'img'=> asset('web') . "/" . $Info[$i]->img,
               'created_at'=> $Info[$i]->created_at->format('Y-m-d') ,

            ];
        }
        return  $data;
      }



}

