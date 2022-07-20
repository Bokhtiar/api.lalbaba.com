<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ProductVariant extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='product_variants';
    protected $primaryKey='product_variant_id';

    protected $fillable = [
        'product_id',
        'title',
        'sell_price',
        'discount_price',
        'total_quantity',
        'alert_quantity'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'product_id' => 'integer | required',
            'title' => "required",
            'sell_price' => "required",
        ])->validate();
    }

    public function scopeFindId($q, $id)
    {
        return self::find($id);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
