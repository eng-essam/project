<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users(){
        return $this->belongsToMany(Service::class,'user_user')->withTimestamps()->withPivot('user1_id','message','status','admin_name');
    }

    public function unions()
    {
        return $this->belongsToMany(Union::class,'union_service')->withTimestamps()->withPivot('service_cost');
    }

     /*  public function test(){
        $test = $this->unions;
        $data = [];
        for ($i=0; $i<$test->count();$i++){
            $data[] = [
               'union_id'=> $test[$i]-> pivot->union_id,
               'service_id'=> $test[$i]-> pivot->service_id,
               'service_cost'=> $test[$i]-> pivot->service_cost,
            ];
        }
        return  $data;
      } */


}
