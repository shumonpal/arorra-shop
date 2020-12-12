<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SubcategoryResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'descp' => $this->descp,
            'products_by_subcategory_url' => url('api/products-by-subcategory/' . $this->id),
        ];
    }
}
