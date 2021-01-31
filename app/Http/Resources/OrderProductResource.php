<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderProductResource extends Resource
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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'price' => $this->price,
            'qty' => $this->qty,
            'size' => $this->size,
            'color' => $this->color
        ];
    }
}
