<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
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
            'user_id' => Auth::guard('api')->user()->id,
            // 'name' => Auth::guard('api')->user()->name,
            'invoice_id' => $this->invoice_id,
            'invoice_description' => $this->invoice_description,
            'payer_email' => Auth::guard('api')->user()->email,
            'status' => $this->status,
            'pay_method' => $this->pay_method,
            'shipping_method' => $this->shipping_method,
            'total' => $this->total,
            'order_content' => $this->when($this->products,  new OrderProductResource($this->products)),
            'created_at' => $this->created_at,

        ];
    }
}
