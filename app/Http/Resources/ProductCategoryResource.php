<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'name_ar'=>$this->name_ar,
            'index' => $this->index,
            'description' => $this->descrition,
            'description_ar' => $this->descrition_ar,
            'restaurant' => new RestaurantResource($this->restaurant),
            'products' => ProductResource::collection($this->whenLoaded('products')->load('images')),
        ];
    }
}
