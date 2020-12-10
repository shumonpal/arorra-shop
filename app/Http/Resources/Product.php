<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'up_price' => $this->up_price,
            'descp' => $this->descp,
            'in_stock' => $this->in_stock,
            'brand' => new BrandResource($this->brands),
            'category' => new CategoryResource($this->category),
            'subcategory' => new SubcategoryResource($this->subcategory),
            'sizes' => SizeResource::collection($this->Size),
            'colors' => ColorResource::collection($this->colors),
            'images' => ImageResource::collection($this->images),
            'banner_image' => asset($this->banner_image),
            'related_products' => url('api/product-related/'.$this->id),
        ];
    }
}
