<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subcategory
 * @package App\Models
 * @version May 5, 2019, 2:19 pm UTC
 *
 * @property string name
 * @property string descp
 */
class Subcategory extends Model
{
    use SoftDeletes;

    public $table = 'subcategories';
    

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
        'name' => 'required|min:2|max:50',
        'descp' => 'nullable',
        'category_id' => 'required',
    ];




    
}
