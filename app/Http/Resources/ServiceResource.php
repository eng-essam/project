<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            
           'id'=> $this->id,
           'namear'=> $this->namear,
           'title'=> $this->title,
           'img'=> $this->img,
            //'service_cost'=>$this->test(),

        ];
    }
}
