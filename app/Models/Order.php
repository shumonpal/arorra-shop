<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version September 21, 2019, 2:39 pm UTC
 *
 * @property integer payer_id
 * @property string invoice_id
 * @property string invoice_description
 * @property integer discount
 * @property integer user_id
 * @property string payer_email
 * @property integer status
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'payer_id',
        'user_id',
        'invoice_id',
        'invoice_description',
        'discount',
        'payer_email',
        'color',
        'size',
        'status',
        'pay_method',
        'shipping_method',
        'total',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payer_id' => 'integer',
        'user_id' => 'integer',
        'invoice_id' => 'string',
        'invoice_description' => 'string',
        'discount' => 'integer',
        'payer_email' => 'string',
        'color' => 'string',
        'size' => 'string',
        'status' => 'integer',
        'pay_method' => 'string',
        'shipping_method' => 'string',
        'total' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'payer_id' => 'required',
        'user_id' => 'required',
        'invoice_id' => 'required',
        'pay_method' => 'required',
        'shipping_method' => 'required',
        'total' => 'required',
    ];

    
}
