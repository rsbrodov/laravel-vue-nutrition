<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DishesResource extends JsonResource
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
            'description' => $this->description,
            'culinary_processings_id' => $this->culinary_processings_id,
            'yield' => $this->yield,
            'techmap_number' => $this->techmap_number,
            'dishes_categories' => $this->dishes_categories,
            'recipes_collections' => $this->recipes_collections,
            'created_at' => date('d.m.Y', strtotime($this->created_at)),
        ];
    }
}
