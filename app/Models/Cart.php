<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    use CrudTrait;
    protected $table='carts';
    protected $primaryKey='cart_id';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_name', 
        'product_image',
        'total_price',
        'product_price',
        'order_id',
        'ip_address',
        'quantity',
        'property_id',
        'discount',
        'type'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePropertiesName($q, $property_id, $product_id)
    {
       $product = Product::find($product_id);
       $property = $product->properties;
       foreach ($property as $p) {
            if($p['id'] == $property_id){
                return $p;
            }
       }
      
    }



    public static function total_item_cart()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
                ->where('ip_address', request()->ip())
                ->where('order_id', NULL)
                ->get();
        } else {
            $cart = Cart::where('ip_address', request()->ip())
                ->where('order_id', NULL)
                ->get();
        }
        $total_item = 0;
        foreach ($cart as $v_cart) {
            $total_item += $v_cart->quantity;
        }
        return $total_item;
    }




    public static function item_cart($type)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->where('ip_address', request()->ip())->where('order_id', NULL)->where('type', $type)->get();
        } else {
            $cart = Cart::where('ip_address', request()->ip())
                ->where('order_id', NULL)
                ->get();
        }

        return $cart;
    }
}
