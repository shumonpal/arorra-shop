<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version March 19, 2019, 3:35 pm UTC
 *
 * @property string name
 * @property string descp
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'descp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'descp' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:50|unique:categories',
        'descp' => 'nullable|max:255'
    ];

    public function subcategories()
    {
        return $this->belongsToMany('App\Models\Subcategory', 'category_subcategory');
    }
}
