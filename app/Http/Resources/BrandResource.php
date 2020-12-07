<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BrandResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'logo' => asset($this->logo),
            'products_by_brand_url' => url('api/products-by-brand/'.$this->id),
        ];
    }
}
