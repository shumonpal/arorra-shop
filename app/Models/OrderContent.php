<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{

    public $table = 'order_content';

    protected $fillable = ['order_id', 'product_id', 'price', 'qty', 'size', 'color'];

    public function order()
    {
    	return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
