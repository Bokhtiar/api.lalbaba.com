<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    use HasFactory;
    use CrudTrait;
    protected $table='wishlists';
    protected $primaryKey='wishlist_id';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_image',
        'product_price',
        'order_id',
        'type'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }



    public static function total_item_wishlist()
    {
        if (Auth::check()) {
            $cart = Wishlist::where('user_id', Auth::id())
                ->where('order_id', NULL)
                ->get();
        }
        $total_item = 0;
        foreach ($cart as $v_cart) {
            $total_item += $v_cart->quantity;
        }
        return $total_item;
    }




    public static function item_wishlist($type)
    {
        if (Auth::check()) {
            $cart = Wishlist::where('user_id', Auth::id())
            ->where('order_id', NULL)
            ->where('type', $type)
            ->get();
        }

        return $cart;
    }
}
