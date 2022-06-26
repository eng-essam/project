<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'ssn'=>$this->ssn,
            'phone'=> $this->phone,
            'sex'=>$this->sex,
            'union_number'=>$this->union_number,
            'union_id'=>$this->union_id,
            'role_id'=>$this->role_id,

         ];
    }
}
