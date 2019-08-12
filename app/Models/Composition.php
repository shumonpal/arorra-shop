<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Composition
 * @package App\Models
 * @version May 31, 2019, 12:36 pm UTC
 *
 * @property string name
 */
class Composition extends Model
{
    use SoftDeletes;

    public $table = 'compositions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:50'
    ];

    
}
