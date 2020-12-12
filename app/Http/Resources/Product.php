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
            'name' => $this->name,
            'price' => $this->price,
            'up_price' => $this->up_price,
            'descp' => $this->descp,
            'in_stock' => $this->in_stock,
            'brand' => $this->when($this->brands,  new BrandResource($this->brands)),
            'category' => $this->when($this->category,  new CategoryResource($this->category)),
            'subcategory' => $this->when($this->category,  new SubcategoryResource($this->subcategory)),
            'sizes' => $this->when($this->sizes, SizeResource::collection($this->sizes)),
            'colors' => $this->when($this->colors, ColorResource::collection($this->colors)),
            'images' => $this->when($this->images, ImageResource::collection($this->images)),
            'banner_image' => asset($this->banner_image),
            'related_products' => url('api/product-related/' . $this->id),
        ];
    }
}
