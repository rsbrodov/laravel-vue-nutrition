<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    //public static $wrap = 'user';
    /*public function boot()
    {
        ProductsResource::withoutWrapping();
    }*/

    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'products_categories_id' => $this->products_categories_id,
            'protein' => $this->protein,
            'fat' => $this->fat,
            'carbohydrates_total' => $this->carbohydrates_total,
            'vitamin_a' => $this->vitamin_a,
            'vitamin_b1' => $this->vitamin_b1,
            'vitamin_b2' => $this->vitamin_b2,
            'created_at' => date('d.m.Y', strtotime($this->created_at)),
            'products_categories' => new ProductsCategoryResource($this->products_categories),
        ];
    }
}
