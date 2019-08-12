<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 * @package App\Models
 * @version April 11, 2019, 2:48 pm UTC
 *
 * @property string name
 * @property string logo
 */
class Brand extends Model
{
    use SoftDeletes;

    public $table = 'brands';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'logo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:100|unique:brands',
        'logo' => 'nullable|max:100'
    ];

    
}
