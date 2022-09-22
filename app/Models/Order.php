<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='orders';
    protected $primaryKey='order_id';

    protected $fillable = [
        'f_name',
        'l_name',
        'email',
        'phone',
        'type',
        'address_1',
        'address_2',
        'message',
        'user_id',

        'ordered',
        'packed',
        'out_for_delivery',
        'delivered',
        'payment_number',

        'payment_type',
        'payment_balance',
        'referral_balance',
        'total_balance',
        'referral_type',
        'coupone_balance',
        'coupone_code',

        'delivery_charge',
        'zip_code',

        'aboundone_balance',
        'status'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'f_name' => 'string | required',
            'l_name' => 'string | required',
            'email' => 'string | required',
            'phone' => 'string | required',
            'address_1' => 'string | required',
            'address_2' => 'string | required',
            'message' => 'string | required',
            'payment_type' => 'string | required',
            'total_balance' => 'string | required',
        ])->validate();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFindId($q, $id)
    {
        return self::find($id);
    }

    /**check Aboundoned Balance */
    public static function AboundonedBalance()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('order_id', NULL)
            ->get();

        $total_aboundoned_balance = 0;
        foreach ($cart as $v_cart) {
            $total_aboundoned_balance += $v_cart->discount;
        }
        return $total_aboundoned_balance;
    }
}
