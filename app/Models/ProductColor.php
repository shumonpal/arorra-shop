<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{

    public $table = 'product_color';

    public function products()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
