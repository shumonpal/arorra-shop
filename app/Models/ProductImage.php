<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    public $table = 'product_image';

    public function products()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
