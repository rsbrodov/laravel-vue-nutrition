<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'name' => $this->name,
            'days' => $this->days,
            'nutritions' => $this->nutritions,
            'created_at' => date('d.m.Y', strtotime($this->created_at)),
            //'products_categories' => new ProductsCategoryResource($this->products_categories),
        ];
    }
}
