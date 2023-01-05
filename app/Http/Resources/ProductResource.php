<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'price' => $this->price,
            'calories' => $this->calories,
            'description' => $this->description,
            'description_ar' => $this->description_ar,
            'images'=> ProductImagesResource::collection($this->whenLoaded('images')),
        ];
    }
}
