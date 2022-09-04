<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DishesProductsResource extends JsonResource
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
            'id' => $this->id,
            'dishes_id' => $this->dishes_id,
            'products_id' => $this->products_id,
            'net_weight' => $this->net_weight,
            'gross_weight' => $this->gross_weight,
            'created_at' => date('d.m.Y', strtotime($this->created_at)),
        ];
    }
}
