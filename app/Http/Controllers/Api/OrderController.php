<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    use ApiResponseTrait;

    public function store(Request $request)
    {
        $validated = Order::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $order = Order::create([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'type' => $request->type,
                    'user_id' => Auth::user()->id,
                    'address_1' => $request->address_1,
                    'address_2' => $request->address_2,
                    'message' => $request->message,
                    'payment_number' => $request->payment_number,
                    'payment_type' => $request->payment_type,
                    'payment_balance' => $request->payment_balance,
                ]);

                if (!empty($order)) {
                    foreach (Cart::item_cart($request->type) as $cart) {
                        $cart['order_id']=$order->order_id;
                        $cart->save();
                    }
                    DB::commit();
                    $message = "Order Successfully Done..!";
                    return $this->SuccessResponse($message);
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return $this->ErrorResponse($ex->getMessage());
                DB::rollBack();
            }
        }

    }

    
}
