<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnionResource extends JsonResource
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
            'phone'=> $this->phone,
            'bank'=> $this->bank,
            'services'=> ServiceResource::collection($this->whenLoaded('services')),
            'service_cost'=>$this->test(),
            'information'=>$this->Info(),


         ];
    }
}
