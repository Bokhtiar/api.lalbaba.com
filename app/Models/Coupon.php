<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Coupon extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table= 'coupons';
    protected $primaryKey= 'coupon_id';

    protected $fillable = [
        'coupon_id',
        'title',
        'discount_percentage',
        'discount_flat',
        'code',
        'min_price',
        'max_price',
'        max_price_above_discount'
    ];

    public function scopeValidation($value, $request)
    {
        return Validator::make($request, [
            'title' => 'string | required | max:15 | min:3',
            'code' => 'string | required | max:15 | min:3',
            'min_price' => 'required',
        ])->validate();
    }
}
