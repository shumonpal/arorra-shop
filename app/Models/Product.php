<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version May 8, 2019, 4:17 pm UTC
 *
 * @property string name
 * @property integer brand_id
 * @property integer categories_id
 * @property integer subcategories_id
 * @property string price
 * @property string up_price
 * @property string descp
 * @property integer composition
 * @property tinyInteger is_featured
 * @property tinyInteger is_discount
 * @property integer in_stock
 * @property string banner_image
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'brand_id',
        'category_id',
        'subcategory_id',
        'price',
        'up_price',
        'descp',
        'composition_id',
        'is_featured',
        'is_discount',
        'in_stock',
        'banner_image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'brand_id' => 'integer',
        'category_id' => 'integer',
        'subcategory_id' => 'integer',
        'price' => 'string',
        'up_price' => 'string',
        'descp' => 'string',
        'composition_id' => 'integer',
        'in_stock' => 'integer',
        'banner_image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'brand_id' => 'required',
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'price' => 'required|max:100',
        'up_price' => 'required|max:100',
        'descp' => 'required|max:1500',
        'composition_id' => 'nullable',
        'is_featured' => 'nullable',
        'is_discount' => 'nullable',
        'in_stock' => 'required|max:10',
        'banner_image' => 'nullable'
    ];


    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function colors()
    {
        return $this->hasMany('App\Models\ProductColor');
    }

    public function sizes()
    {
        return $this->hasMany('App\Models\ProductSize');
    }

    public function brands()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory', 'subcategory_id');
    }
 
}
